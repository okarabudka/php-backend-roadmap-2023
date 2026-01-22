<?php
/**
 * Bridge pattern
 */

namespace Pattern;

/**
 * Abstract base class Carer describes the car interface
 */
abstract class Carer
{
    /**
     * A car can drive (it needs an engine)
     *
     * @return string
     */
    public abstract function rase();
}

/**
 * Abstract base class Enginer describes the engine interface
 * Each engine must implement it
 */
abstract class Enginer
{
    /**
     * Returns the engine sound
     *
     * @return string
     */
    public abstract function getSound();
}

/**
 * Car implements a car
 */
class Car extends Carer
{
    /**
     * @var Enginer
     */
    protected $engine;

    /**
     * Constructor
     *
     * @param Enginer $engine - engine
     */
    public function __construct(Enginer $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Car drives
     *
     * @return string
     */
    public function rase()
    {
        return $this->engine->getSound();
    }
}

/**
 * EngineSuzuki implements a Suzuki engine
 */
class EngineSuzuki extends Enginer
{
    /**
     * Method returns the engine sound
     *
     * @return string
     */
    public function getSound()
    {
        return "SssuuuuZzzuuuuKkiiiii";
    }
}

/**
 * EngineHonda implements a Honda engine
 */
class EngineHonda extends Enginer
{
    /**
     * Method returns the engine sound
     *
     * @return string
     */
    public function getSound()
    {
        return "HhoooNnnnnnnnnDddaaaaaaa";
    }
}

/**
 * EngineLada implements an AvtoVAZ engine
 */
class EngineLada extends Enginer
{
    /**
     * Method returns the engine sound
     *
     * @return string
     */
    public function getSound()
    {
        return "PhhhhPhhhhPhPhPhPhPh";
    }
}
