<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 2/1/2016
 * Time: 10:48 PM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class AdminFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Admin';
    }
}