<?php
/**
 * Chain of Responsibility pattern
 */

namespace Pattern;

/**
 * Base abstract class Handler describes the interface for handlers in the chain
 */
abstract class Handler
{
    /**
     * @var Handler - successor
     */
    protected $successor;

    /**
     * Handles or forwards the request down the chain
     *
     * @param Handler handler - handler
     *
     * @return Handler
     */
    public function addHandler(Handler $handler)
    {
        $this->successor = $handler;

        return $handler;
    }

    /**
     * Handles or forwards the request down the chain
     *
     * @param int message - message to handle
     *
     * @return string
     */
    public abstract function sendRequest($message);
}

/**
 * ConcreteHandlerA implements handler \"A\"
 */
class ConcreteHandlerA extends Handler
{
    /**
     * Handles or forwards the request down the chain
     *
     * @param int message - message to handle
     *
     * @return string
     */
    public function sendRequest($message)
    {

        $result = "";

        if ($message === 1) {
            $result = "Im handler 1";
        } else if ($this->successor != null) {
            $result = $this->successor->sendRequest($message);
        }

        return $result;
    }
}

/**
 * ConcreteHandlerB implements handler \"B\"
 */
class ConcreteHandlerB extends Handler
{
    /**
     * Handles or forwards the request down the chain
     *
     * @param int message - message to handle
     *
     * @return string
     */
    public function sendRequest($message)
    {

        $result = "";

        if ($message === 2) {
            $result = "Im handler 2";
        } else if ($this->successor != null) {
            $result = $this->successor->sendRequest($message);
        }

        return $result;
    }
}

/**
 * ConcreteHandlerC implements handler \"C\"
 */
class ConcreteHandlerC extends Handler
{
    /**
     * Handles or forwards the request down the chain
     *
     * @param int message - message to handle
     *
     * @return string
     */
    public function sendRequest($message)
    {

        $result = "";

        if ($message === 3) {
            $result = "Im handler 3";
        } else if ($this->successor != null) {
            $result = $this->successor->sendRequest($message);
        }

        return $result;
    }
}
