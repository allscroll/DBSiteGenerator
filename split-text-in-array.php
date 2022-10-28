<?php

// Разбивает текст с тегами на предложения в массив

$text = file_get_contents( 'text.txt' );

$text = preg_replace( "#\s{2,}#", "", $text );

// echo $text;

// echo '<br><br><br>';

$text = strip_tags( $text );

$res = preg_split( "#[?!.]+#", $text, 0, PREG_SPLIT_NO_EMPTY );

// array_walk( $res, 'trim' );

$res = array_map( 'trim', $res );

$res = array_filter( $res, function( $el ) {
    return strlen( $el ) > 100;
} );

$res = array_filter( $res, function( $el ) {
    return preg_match( "#^[A-Z]#", $el );
} );

echo '<pre>';
print_r( $res );
echo '</pre>';
