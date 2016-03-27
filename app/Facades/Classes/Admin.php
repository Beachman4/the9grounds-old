<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 2/1/2016
 * Time: 10:46 PM
 */

namespace App\Facades\Classes;


class Admin
{
    public static $buttons = [];

    public static $title = '';

    public static function title($title)
    {
        self::$title = $title;
        return true;
    }
    public static function button($name, $url)
    {
        array_push(self::$buttons, [$name   =>  $url]);
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function getButtons()
    {
        return self::$buttons;
    }


}