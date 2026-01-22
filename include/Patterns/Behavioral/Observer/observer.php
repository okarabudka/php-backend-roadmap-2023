<?php
/**
 * Observer pattern
 * Push model is described
 */

namespace Pattern;

/**
 * Base abstract class Subject describes the publisher interface
 */
abstract class Subject
{
    /**
     * Adds a subscriber
     *
     * @param Observer $observer - subscriber
     */
    public abstract function attach(Observer $observer);

    /**
     * Sends notifications using the push method
     */
    public abstract function notify();
}

/**
 * Base abstract class Observer describes the subscriber interface
 */
abstract class Observer
{
    /**
     * Updates the subscriber state
     *
     * @param string $state - state
     */
    public abstract function update($state);
}

/**
 * ConcreteSubject implements the publisher
 */
class ConcreteSubject extends Subject
{
    /**
     * @var string
     */
    public $state;
    /**
     * @var []Observer
     */
    protected $observers;

    /**
     * Adds a subscriber
     *
     * @param Observer $observer - subscriber
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * Sends notifications using the push method
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }
    }
}

/**
 * ConcreteObserver implements the subscriber
 */
class ConcreteObserver extends Observer
{
    /**
     * @var string
     */
    public $state;

    /**
     * Updates the subscriber state
     *
     * @param string $state - state
     */
    public function update($state)
    {
        $this->state = $state;
    }
}
