<?php
//http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1/15314662#15314662
require_once('twitter-api-php/TwitterAPIExchange.php');
/*function wp_get_all_post_titles() {
global $wpdb;
return $wpdb->get_col("SELECT post_title FROM $wpdb->posts");
}*/
function wp_exist_post_by_title($title_str) {
global $wpdb;
return $wpdb->get_row("SELECT * FROM wp_posts WHERE post_title = '" . $title_str . "'", 'ARRAY_A');
}

add_filter('cron_schedules', 'new_interval');

// add new intervals to wp schedules
function new_interval($interval) {

    $interval['minutes_10'] = array('interval' => 10*60, 'display' => 'Once 10 minutes');
    $interval['minutes_5'] = array('interval' => 5*60, 'display' => 'Once 5 minutes');
    $interval['minutes_1'] = array('interval' => 1*60, 'display' => 'Once 1 minute');


    return $interval;
}



function tweets_by_hashtag($hashtag){
            /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
            //https://apps.twitter.com/app/5956691
            $settings = array(
                'oauth_access_token' => "38484663-oflVrNjZAvCj4H6XAVvyYibGPM0EohmbsQMitkqAS",
                'oauth_access_token_secret' => "GjkVCYYIuQNkIGS2H5Cwb2DVGakmCkKGXp67bJGxJYJTQ",
                'consumer_key' => "itu6rGsM4dkWnFzCNGq1rQ",
                'consumer_secret' => "BmydlPpU0zS0gDXCbZsqeRxoBM0VHSyIkrUAQ6cYo"
            );
            $url = 'https://api.twitter.com/1.1/search/tweets.json'; 
            $getfield = '?q=%23'.$hashtag.'%20-RT&result_type=recent';
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);
            $raw_response = $twitter->setGetfield($getfield)
                         ->buildOauth($url, $requestMethod)
                         ->performRequest();

        if ( is_wp_error($raw_response) ) {
            $output = "<p>Failed to update from Twitter!</p>\n";
            $output .= "<!--{$raw_response->errors['http_request_failed'][0]}-->\n";
            $output .= get_option('twitter_hash_tag_cache');
        } else {
            if ( function_exists('json_decode') ) {
                $response = get_object_vars(json_decode($raw_response));
                for ( $i=0; $i < count($response['statuses']); $i++ ) {
                    $response['statuses'][$i] = get_object_vars($response['statuses'][$i]);
                }
            } else {
                include(ABSPATH . WPINC . '/js/tinymce/plugins/spellchecker/classes/utils/JSON.php');
                $json = new Moxiecode_JSON();
                $response = @$json->decode($raw_response);
            }

            foreach ( $response['statuses'] as $result ) {
                // Create post object

                $text = $result['text'];
                $user = $result['user']->name;
                $image = $result['user']->profile_image_url;
                $user_url = $result['user']->url;
                $text = preg_replace('|(https?://[^\ ]+)|', '<a href="$1">$1</a>', $text);
                $text = preg_replace('|@(\w+)|', '<a href="http://twitter.com/$1">@$1</a>', $text);
                $text = preg_replace('|#(\w+)|', '<a href="http://search.twitter.com/search?q=%23$1">#$1</a>', $text);

                $tweet_post = array(
                  'post_title'    => $result['id'],
                  'post_content'  => $text,
                  'post_status'   => 'publish',
                  'post_author'   => 1,
                  'post_category' => array(3, 288)
                );

               if(!wp_exist_post_by_title($result['id'])){
                    // Insert the post into the database
                   $post_id = wp_insert_post( $tweet_post );
                    add_post_meta($post_id, 'tweet_image', $image);
                    add_post_meta($post_id, 'tweet_author', $user);
                    wp_set_post_tags( $post_id, array($hashtag));
                }
            }
            
        }
    }

//Cron job to hourly get tweets
add_action( 'wp', 'prefix_setup_schedule' );
/**
 * On an early action hook, check if the hook is scheduled - if not, schedule it.
 */
function prefix_setup_schedule() {

    if ( ! wp_next_scheduled( 'prefix_hourly_event' ) ) {
        wp_schedule_event( time(), 'minutes_5', 'prefix_hourly_event');
        //can be minutes_1 or minutes_10 too.
    }
}

add_action( 'prefix_hourly_event', 'prefix_do_this_hourly' );
/**
 * On the scheduled action hook, run a function.
 */
function prefix_do_this_hourly() {
   $page = get_page_by_path('center-panel');
       if ( $page )
    {
       $tweet_hashtag = get_field('twitter_hashtag', $page->ID);
    }
    if(isset($tweet_hashtag)){
         tweets_by_hashtag($tweet_hashtag);
     }
}


?>