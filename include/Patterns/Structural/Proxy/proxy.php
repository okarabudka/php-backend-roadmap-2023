<?php
/**
 * Proxy pattern
 */

namespace Pattern;

/**
 * Subject interface describes the interface for the real object and its surrogate
 */
interface ISubject
{
    /**
     * Subject speaks
     *
     * @return string
     */
    public function send();
}

/**
 * Proxy implements the surrogate object
 */
class Proxy implements ISubject
{
    /**
     * @var Subject
     */
    protected $realSubject;

    /**
     * Surrogate speaks
     *
     * @return string
     */
    public function send()
    {
        // You can attach the real object in the controller.
        // Or aggregate it when creating the surrogate.
        // It depends on the final goals.
        if ($this->realSubject == null) {
            $this->realSubject = new RealSubject();
        }

        return "<strong>" . $this->realSubject->send() . "</strong>";
    }
}

/**
 * RealSubject implements the real object
 */
class RealSubject implements ISubject
{
    /**
     * Real object speaks
     *
     * @return string
     */
    public function send()
    {
        return "I'll be back!";
    }
}
