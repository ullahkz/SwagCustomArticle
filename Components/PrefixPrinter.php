<?php
/**
 * Created by PhpStorm.
 * User: KAZI
 * Date: 30/01/2019
 * Time: 10:51
 */

namespace SwagCustomArticle\Components;

class PrefixPrinter
{
    public function getPrefix()
    {
        $prefix = [
            'This is a Prefix',
            'Präfix vor dem Titel'
        ];

        return array_rand(array_flip($prefix));
    }
}