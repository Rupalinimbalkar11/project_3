<?php
    if( !defined( 'ABSPATH' ) ){
        exit;
    }

    function ztslider_get_excerpt($excerpt_lenght){
        $excerpt = explode(' ', get_the_excerpt(), $excerpt_lenght);
        if (count($excerpt)>=$excerpt_lenght) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return $excerpt;
    }