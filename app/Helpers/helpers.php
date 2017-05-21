<?php
/**
 * Created by PhpStorm.
 * User: rome0s
 * Date: 07.05.17
 * Time: 22:48
 */

if(! function_exists('anchor_link')) {

    function anchor_link($url) {

        return request()->url() == $url ? "" : "href=\"$url\"";

    }

}
