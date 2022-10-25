<?php

class SEOGen
{
    /**
     * Генерация заголовка
     */
    public static function getTitle( string $key ): string
    {
        $prefix = [
            '',
        ];
        $postfix = [
            '',
        ];

        shuffle( $prefix );
        shuffle( $postfix );

        return $prefix[ array_rand( $prefix ) ] .' '. $key .' '. $postfix[ array_rand( $postfix ) ];
    }

    /**
     * Генерация seo description
     */
    public static function getSeoDescription( string $text ): string
    {

    }

    /**
     * Генерация seo keywords
     */
    public static function getSeoDescription( string $text ): string
    {
        $templates = [];

        shuffle( $templates );
        $randNum = mt_rand(3, 5);

        $randTemplateIds = array_rand( $prefix, $randNum );

        $res = [];
        foreach ( $randTemplateIds as $id ) {
            $res[] = $templates[ $id ];
        }

        return $res;
    }
}
