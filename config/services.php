<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'key' => '',
		'secret' => '',
	],



    'facebook' => [
        'client_id'     => '379307572272091',
        'client_secret' => '33e6b49eefa490219a5b12cc41852021',
        'redirect' => 'http://localhost/Web-Assignment/public/facebookredirect',
    ],


    'github' => [
        'client_id'     => '9a86a405fd6645ab8eb0',
        'client_secret' => 'd5eecf8489e356d59feca98daf7c0c7ebc9d0abd',
        'redirect' => 'http://localhost/Web-Assignment/public/githubredirect',
    ],

];
