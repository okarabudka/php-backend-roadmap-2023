<?php
/**
 * Flyweight pattern
 */

namespace Pattern;

/**
 * Abstract base class Flyweighter describes the common interface for flyweights
 */
abstract class Flyweighter
{
    /**
     * Get the flyweight name
     *
     * @return string
     */
    public abstract function getName();

    /**
     * Set the flyweight name
     *
     * @param string $name - name
     */
    public abstract function setName($name);
}

/**
 * FlyweightFactory implements a factory for creating flyweights.
 * If a suitable flyweight is in the pool, it returns it.
 */
class FlyweightFactory
{
    /**
     * @var []Flyweighter
     */
    public $pool = array();

    /**
     * Create or get a suitable flyweight by state.
     * In this case, state is a number that identifies a specific flyweight.
     *
     * @param int $state - flyweight state
     *
     * @return Flyweighter
     */
    public function getFlyweight($state)
    {
        if (!array_key_exists($state, $this->pool)) {
            $this->pool[$state] = new ConcreteFlyweight($state);
        }

        return $this->pool[$state];
    }
}

/**
 * ConcreteFlyweight implements the flyweight
 */
class ConcreteFlyweight extends Flyweighter
{
    /**
     * @var int
     */
    protected $state;

    /**
     * @var string
     */
    protected $name;

    /**
     * Constructor
     *
     * @param int $state - flyweight state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * Get the flyweight name
     *
     * @return string
     */
    public function getName()
    {
        return "My name: " . $this->name;
    }

    /**
     * Set the flyweight name
     *
     * @param string $name - name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
