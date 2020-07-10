<?php

$config = array(
	'vk_url' => 'https://vk.com/asfdgyvjkuahli',
	'inst_url' => '',
	'fb_url' => '',
	'login' => 'admin',
	'password' => 'admin__hack'
);

require "db.php";

session_start();

function dumb($what)
{
	echo '<pre>';print_r($what);echo '</pre>';
}
