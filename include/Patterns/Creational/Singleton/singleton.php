<?php
/**
 * Singleton pattern
 */

namespace Pattern;

/*
 * Singleton class
 */

class Singleton
{
    /**
     * @var Singleton
     */
    public static $instance;

    /**
     * Prevent direct instantiation
     */
    private function __construct()
    {
    }

    /**
     * Get the class instance
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Prevent cloning of the created instance
     */
    private function __clone()
    {
    }
}
