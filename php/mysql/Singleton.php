<?php
namespace ScriptProject\Mysql;

trait Singleton
{
    /**
     * @var static
     */
    private static $instance;

    final protected function __construct() {}
    final protected function __clone() {}

    final public static function singleton()
    {
        if (null === static::$instance) {
            static::$instance = new static();
//            echo "new static\n";
        }
        else {
//            echo "old static\n";
        }
        return static::$instance;
    }

    final public static function swap($instance)
    {
        static::$instance = $instance;
    }
}