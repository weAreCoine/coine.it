<?php

namespace App\Traits;

trait Singleton {
    private static ?self $instance = null;

    public static function getInstance(): self {
        $class = __CLASS__;
        if ( self::$instance === null ) {
            self::$instance = new $class;
        }

        return self::$instance;
    }
}
