<?php
/**
 * Abstract Factory pattern
 */

namespace Pattern;

/**
 * Base abstract class AbstractFactory describes the abstract factory interface
 * for producing soda.
 * Concrete factories must implement it.
 */
abstract class AbstractFactory
{
    /**
     * Creates water
     *
     * @param int|float $value - volume
     *
     * @return CocaColaWater
     */
    public abstract function createWater($volume);

    /**
     * Creates a bottle
     *
     * @param int|float $value - volume
     *
     * @return CocaColaBottle
     */
    public abstract function createBottle($volume);
}

/**
 * Base abstract class AbstractWater describes a drink.
 */
abstract class AbstractWater
{
    /**
     * Ability to get volume
     *
     * @return int|float
     */
    public abstract function getVolume();
}

/**
 * Base abstract class AbstractBottle describes a bottle.
 */
abstract class AbstractBottle
{
    /**
     * The bottle interacts with the drink
     *
     * @param AbstractWater $water - drink
     */
    public abstract function interactWater(AbstractWater $water);

    /**
     * Ability to get bottle volume
     *
     * @return int|float
     */

    public abstract function getBottleVolume();

    /**
     * Ability to get drink volume in the bottle
     *
     * @return int|float
     */
    public abstract function getWaterVolume();
}

/**
 * CocaColaFactory implements the factory for producing CocaCola.
 */
class CocaColaFactory extends AbstractFactory
{
    /**
     * Creates water
     *
     * @param int|float $value - volume
     *
     * @return CocaColaWater
     */
    public function createWater($volume)
    {
        return new CocaColaWater($volume);
    }

    /**
     * Creates a bottle
     *
     * @param int|float $value - volume
     *
     * @return CocaColaBottle
     */
    public function createBottle($volume)
    {
        return new CocaColaBottle($volume);
    }
}

/**
 * CocaCola drink
 */
class CocaColaWater extends AbstractWater
{
    /**
     * @var int|float - created drink volume
     */
    protected $volume;

    /**
     * Constructor
     *
     * @param int|float $volume - volume
     */
    public function __construct($volume)
    {
        $this->volume = $volume;
    }

    /**
     * Get the created drink volume
     *
     * @return int|float
     */
    public function getVolume()
    {
        return $this->volume;
    }
}

/**
 * CocaCola bottle
 */
class CocaColaBottle extends AbstractBottle
{
    /**
     * @var CocaColaWater - drink
     */
    protected $water;

    /**
     * @var int|float - bottle volume
     */
    protected $volume;

    /**
     * Constructor
     *
     * @param int|float $volume - volume
     */
    public function __construct($volume)
    {
        $this->volume = $volume;
    }

    /**
     * Pour drink into the bottle
     *
     * @param CocaColaWater $water - drink
     */
    public function interactWater(AbstractWater $water)
    {
        $this->water = $water;
    }

    /**
     * Get bottle volume
     *
     * @return int|float
     */
    public function getBottleVolume()
    {
        return $this->volume;
    }

    /**
     * Get poured drink volume
     *
     * @return int|float
     */
    public function getWaterVolume()
    {
        if ($this->water instanceof AbstractWater) {
            return $this->water->GetVolume();
        }
        return 0;
    }
}
