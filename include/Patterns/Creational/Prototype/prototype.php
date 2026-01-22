<?php
/**
 * Prototype pattern
 */

namespace Pattern;

/**
 * Abstract Prototyper describes the base interface
 * that each concrete product should implement.
 */
abstract class Prototyper
{
    /**
     * Clone method
     *
     * @return Prototyper
     */
    public abstract function getClone();
}

/**
 * Concrete product "A"
 */
class ConcreteProductA extends Prototyper
{
    /**
     * @var string - product name
     */
    protected $name;

    /**
     * Constructor
     *
     * @param string $name - product name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the product name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Clone method.
     * Each object should implement how it clones itself.
     *
     * @return Prototyper
     */
    public function getClone()
    {
        return new ConcreteProductA($this->name);
    }
}

// ==================================
// Or using the clone keyword
// ==================================

class ConcreteProductB
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __clone()
    {
        // here we can control cloning
    }
}

// $product = new ConcreteProductC('C');
// $cloneProduct = clone $product;
