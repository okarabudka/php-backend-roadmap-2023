<?php
/**
 * Factory Method pattern
 */

namespace Pattern;

/**
 * Base abstract class Creater describes the interface
 * that a concrete factory must implement
 * to produce products.
 */
abstract class Creater
{
    /**
     * Parameterized Factory Method
     *
     * @param string $action
     *
     * @return Producter
     */
    public abstract function createProduct($action);

    /**
     * Register the created product (for completeness)
     *
     * @param Producter $product
     */
    public abstract function registerProduct(Producter $product);
}

/**
 * Base abstract class Producter describes the product interface
 * returned by the factory.
 * All products returned by the factory must follow
 * a common interface.
 */
abstract class Producter
{
    /**
     * Each product should be usable
     *
     * @return string
     */
    public abstract function useProduct();
}

/**
 * Concrete factory for producing products.
 * It has a factory method and produces products.
 */
class ConcreteCreator extends Creater
{
    /**
     * Produced products
     *
     * @var []Producter
     */
    protected $products = array();

    /**
     * Parameterized Factory Method
     *
     * @param string $action
     *
     * @return Producter
     */
    public function createProduct($action)
    {
        switch ($action) {
            case "A":
                $product = new ConcreteProductA($action);
                break;
            case "B":
                $product = new ConcreteProductB($action);
                break;
            case "C":
                $product = new ConcreteProductC($action);
                break;
            default:
                throw new ErrorException("Unknown Action");
        }

        $this->registerProduct($product);

        return $product;
    }

    /**
     * Register the created product in the factory
     *
     * @param Producter $product
     */
    public function registerProduct(Producter $product)
    {
        $this->products[] = $product;
    }
}


/**
 * Concrete product "A" created by the factory
 */
class ConcreteProductA extends Producter
{
    /**
     * @var string - action the product performs
     */
    protected $action;

    /**
     * Constructor
     *
     * @param string $action - action
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * You can use the product and get the action it performs
     *
     * @return string
     */
    public function useProduct()
    {
        return $this->action;
    }
}

/**
 * Concrete product "B" created by the factory
 */
class ConcreteProductB extends Producter
{
    /**
     * @var string - action the product performs
     */
    protected $action;

    /**
     * Constructor
     *
     * @param string $action - action
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * You can use the product and get the action it performs
     *
     * @return string
     */
    public function useProduct()
    {
        return $this->action;
    }
}

/**
 * Concrete product "C" created by the factory
 */
class ConcreteProductC extends Producter
{
    /**
     * @var string - action the product performs
     */
    protected $action;

    /**
     * Constructor
     *
     * @param string $action - action
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * You can use the product and get the action it performs
     *
     * @return string
     */
    public function useProduct()
    {
        return $this->action;
    }
}

