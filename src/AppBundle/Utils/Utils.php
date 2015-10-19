<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-19
 * Time: 19:44
 */

namespace AppBundle\Utils;


class Utils
{
    function generateBase64Url($string)
    {
        return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
    }

    function generateUUIDWithUserId($string)
    {
        return uniqid($string);
    }
}