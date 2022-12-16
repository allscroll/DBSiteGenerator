<?php

define( 'DEFAULT_SHOP', 'http://site.com' );

$referer = $_SERVER[ 'HTTP_REFERER' ];
$key = clear( $_GET[ "key" ] );
//$trackId = $_GET[ "track_id" ];

// PharmEmpire.com
$url = DEFAULT_SHOP . '/search?id=1263&q=' .$key. '&trackid=' .$referer ;
// PharmCash

// Урл главной страницы шопа, если нет ключа
// PharmEmpire.com
$urlDefault = DEFAULT_SHOP . '/?id=1263';
// PharmCash

$pivotKeyLink = [
	'aldara' => 'http://aldara.com',
];

if ( empty( $key ) ) {
	redirect( $urlDefault );
}

if ( array_key_exists( $key, $pivotKeyLink ) ) {
	redirect( $pivotKeyLink[ $key ] );
}

// MAIN ROUT
redirect( $url );


// HELPERS

function clear( $str ) {
	$str = trim( $str );
	$str = mb_strtolower( $str );
	$str = htmlspecialchars( $str );
	
	return $str;
}

function redirect( $url ) {
	header( 'Location:' .$url );
	exit();
}
