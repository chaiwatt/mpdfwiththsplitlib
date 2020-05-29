<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir' 				=> public_path('temp'),
	'font_path' 			=> base_path('public/fonts/'),
	'font_data' => [
		'thsarabunnew' => [
			'R'  => 'THSarabunNew.ttf',    // regular font
			'B'  => 'THSarabunNew-Bold.ttf',       // optional: bold font
			'I'  => 'THSarabunNew-Italic.ttf',     // optional: italic font
			'BI' => 'THSarabunNew-BoldItalic.ttf' // optional: bold-italic font
			//'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			//'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
		// ...add as many as you want.
	]
];
