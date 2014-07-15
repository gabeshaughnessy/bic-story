<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_layar-settings',
		'title' => 'Layar Settings',
		'fields' => array (
			array (
				'key' => 'field_5324f07292efe',
				'label' => 'Layar Name',
				'name' => 'layar_name',
				'type' => 'text',
				'instructions' => 'The name of the layar as registered on the publishing site.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5324e928bf2fa',
				'label' => 'Hotspots',
				'name' => 'layar_hotspots',
				'type' => 'repeater',
				'instructions' => 'Register New Hotspots',
				'sub_fields' => array (
					array (
						'key' => 'field_5324e9b62b6cf',
						'label' => 'Reference Image',
						'name' => 'layar_reference_image',
						'type' => 'text',
						'instructions' => 'the name of the reference image on the layar.com publishing site under the pages section.',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5324e9e82b6d0',
						'label' => 'Content Type',
						'name' => 'layar_content_type',
						'type' => 'select',
						'instructions' => 'The layar widget type.',
						'column_width' => '',
						'choices' => array (
							'text/html' => 'HTML',
							'video/mp4' => 'Video',
							'image/vnd.layar.generic' => 'Image',
						),
						'default_value' => 'text/html',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5324ea0e2b6d1',
						'label' => 'URL',
						'name' => 'layar_url',
						'type' => 'text',
						'instructions' => 'endpoint with the content you want to display on the layar.',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5324ea372b6d2',
						'label' => 'Refresh Interval',
						'name' => 'layar_refresh_interval',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 900,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array (
						'key' => 'field_5324ea751bd69',
						'label' => 'Width',
						'name' => 'layar_width',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 500,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array (
						'key' => 'field_5324eab41bd6a',
						'label' => 'Height',
						'name' => 'layar_height',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 300,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array (
						'key' => 'field_5324eb951bd72',
						'label' => 'Size',
						'name' => 'layar_size',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 1,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => '.0001',
					),
					array (
						'key' => 'field_5324ead11bd6c',
						'label' => 'Interactive',
						'name' => 'layar_interactive',
						'type' => 'true_false',
						'instructions' => 'The user can click on elements in this layar',
						'column_width' => '',
						'message' => '',
						'default_value' => 1,
					),
					array (
						'key' => 'field_5324eae71bd6d',
						'label' => 'Scrollable',
						'name' => 'layar_scrollable',
						'type' => 'true_false',
						'instructions' => 'the user can scroll the window in this layar',
						'column_width' => '',
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5324eb1e1bd6e',
						'label' => 'Translate X',
						'name' => 'layar_translate_x',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '.001',
					),
					array (
						'key' => 'field_5324eb511bd6f',
						'label' => 'Translate Y',
						'name' => 'layar_translate_y',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '.001',
					),
					array (
						'key' => 'field_5324eb5c1bd70',
						'label' => 'Translate Z',
						'name' => 'layar_translate_z',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '.001',
					),
					array (
						'key' => 'field_5324eb6f1bd71',
						'label' => 'Scale',
						'name' => 'layar_scale',
						'type' => 'number',
						'column_width' => '',
						'default_value' => 1,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '.001',
					),
					array (
						'key' => 'field_5324ebc543bb2',
						'label' => 'message',
						'name' => '',
						'type' => 'message',
						'column_width' => '',
						'message' => 'More translate options coming soon. Rotate, et all are on the way.',
					),
				),
				'row_min' => 1,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Hotspot',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'layar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_social-settings',
		'title' => 'Social Settings',
		'fields' => array (
			array (
				'key' => 'field_53335c3b93b76',
				'label' => 'Instagram CTA',
				'name' => 'mof_instagram_cta',
				'type' => 'textarea',
				'instructions' => 'The CTA that pops up when the instagram animation runs',
				'default_value' => 'Tag your instagrams #futuremural and they will show up here.',
				'placeholder' => '',
				'maxlength' => 140,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_53335c9c93b78',
				'label' => 'Tweet CTA',
				'name' => 'mof_tweet_cta',
				'type' => 'textarea',
				'instructions' => 'The CTA that pops up when the twitter animation runs.',
				'default_value' => 'Tag your tweets #futuremural and they will show up here.',
				'placeholder' => '',
				'maxlength' => 140,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_53336ea30f341',
				'label' => 'Twitter Hashtag',
				'name' => 'twitter_hashtag',
				'type' => 'text',
				'instructions' => 'the hashtag to use for twitter posts. don\'t include the \'#\'.
	',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53336ed20f342',
				'label' => 'Looking for the Instagram hashtag?',
				'name' => '',
				'type' => 'message',
				'message' => 'Looking for the Instagram hashtag? It\'s in the Instagrate Pro Account. <a href="wp-admin/edit.php?post_type=instagrate_pro">Look here»</a>',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-center-panel.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>