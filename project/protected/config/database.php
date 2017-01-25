<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_sandra',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',

	//DATABASE TEST
	/*
	'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_sandra',
	'emulatePrepare' => true,
	'username' => 'dodmedia_sergio',
	'password' => ')$f)@J&Iv[I&',
	'charset' => 'utf8',*/

	//DATABASE PRODUCTION
	/*
	'connectionString' => 'mysql:host=localhost;dbname=sandraor_bd_sandra',
	'emulatePrepare' => true,
	'username' => 'sandraor_admin',
	'password' => '#qW)e+=aN&-X',
	'charset' => 'utf8',
	*/
);