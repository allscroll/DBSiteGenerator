<?php

// Разбивает текст с тегами на предложения в массив

$text = file_get_contents( 'text.txt' );

// удаление переносов
$text = preg_replace( "#\s{2,}#", "", $text );

$text = strip_tags( $text );

// разбивка в массив по точке, воскл.зн. либо знаку вопроса
$res = preg_split( "#[?!.]+#", $text, 0, PREG_SPLIT_NO_EMPTY );

// проходим trim по массиву
// $res = array_map( 'trim', $res );
// или так
array_walk( $res, function( &$el ) {
    $el = trim( $el );
} );

// убираем предложения короче 100 символов
$res = array_filter( $res, function( $el ) {
    return strlen( $el ) > 100;
} );

// оставляем только то, что начинается с заглавной буквы
$res = array_filter( $res, function( $el ) {
    return preg_match( "#^[A-Z]#", $el );
} );

// удаляем с вхождением нежелательных символов
$res = array_filter( $res, function( $el ) {
    return !preg_match( "#[\"]#", $el );
} );

echo '<pre>';
print_r( $res );
echo '</pre>';
