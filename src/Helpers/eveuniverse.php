<?php

use Illuminate\Support\HtmlString;

if(!function_exists('eu_select2')){
    function eu_select2($class, $type){
        $class = in_array(substr($class,0,1), ['.', '#']) ? $class : '.'.$class;
        return new HtmlString(
            sprintf(app()->view->make('eveuniverse::script')->render(), $class, $type)
        );
    }
}

if(!function_exists('eu_select2_modal')){
    function eu_select2_modal($class, $type, $modal){
        $class = in_array(substr($class,0,1), ['.', '#']) ? $class : '.'.$class;
        return new HtmlString(
            sprintf(app()->view->make('eveuniverse::modal')->render(), $class, $type, $modal)
        );
    }
}

if(!function_exists('eu_select2_destroy')){

    function eu_select2_destroy($class){
        $class = in_array(substr($class,0,1), ['.', '#']) ? $class : '.'.$class;
        return new HtmlString(
            sprintf(app()->view->make('eveuniverse::destroy')->render(), $class)
        );
    }
}