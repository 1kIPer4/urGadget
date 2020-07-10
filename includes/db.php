<?php

require "libs/rb.php";
R::setup( 'mysql:host=127.0.0.1;dbname=urgadget',
        'root', '' );

R::freeze(false);

if( !R::testConnection() )
{
	exit('Не удалось подключиться к базе данных!');
}