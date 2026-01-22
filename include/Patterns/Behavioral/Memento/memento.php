<?php
/**
 * Memento pattern
 */

namespace Pattern;

/**
 * Originator implements the state owner
 */
class Originator
{
    /**
     * @var string
     */
    public $state;

    /**
     * Creates a state snapshot
     *
     * @return Memento
     */
    public function createMemento()
    {
        return new Memento($this->state);
    }

    /**
     * Restores state
     *
     * @param Memento $memento
     */
    public function SetMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }
}

/**
 * Memento implements storage for the Originator state
 */
class Memento
{
    /**
     * @var string
     */
    protected $state;

    /**
     * Constructor
     *
     * @param string $state - state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}


/**
 * Caretaker receives and stores the memento
 * until it is needed by the originator.
 */
class Caretaker
{
    /**
     * Memento instance
     */
    public $memento;
}
