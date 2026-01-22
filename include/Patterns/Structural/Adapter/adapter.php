<?php
/**
 * Adapter pattern
 */

namespace Pattern;

/**
 * Target describes the interface our system wants to work with
 */
interface ITarget
{
    /**
     * Adapter method
     */
    public function request();
}

/**
 * Adaptee implements the system that needs to be adapted.
 */
class Adaptee
{
    /**
     * Specific request
     * It will be adapted
     *
     * @return string
     */
    public function specificRequest()
    {
        return "Request";
    }
}

/**
 * Adapter implements the adapter
 */
class Adapter extends Adaptee implements ITarget
{
    /**
     * Adapter method
     *
     * @return string
     */
    public function request()
    {
        return $this->specificRequest();
    }
}
