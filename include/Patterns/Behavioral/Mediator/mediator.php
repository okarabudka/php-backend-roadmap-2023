<?php
/**
 * Mediator pattern
 */

namespace Pattern;

/**
 * Base abstract class Mediator describes the mediator interface
 */
abstract class Mediator
{
    /**
     * Communication with colleagues
     *
     * @param string $msg - message
     */
    public abstract function send($msg);
}

/**
 * Base abstract class Colleague describes interaction between colleagues and the Mediator.
 */
abstract class Colleague
{
    /**
     * @var Mediator
     */
    protected $mediator;

    /**
     * Set mediator
     *
     * @param Mediator $mediator - mediator
     */
    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }
}

/**
 * ConcreteMediator implements the mediator
 */
class ConcreteMediator extends Mediator
{
    /**
     * @var Farmer
     */
    public $farmer;

    /**
     * @var Cannery
     */
    public $cannery;

    /**
     * @var Shop
     */
    public $shop;

    /**
     * Communication with colleagues
     *
     * @param string $msg - message
     */
    public function send($msg)
    {
        if ($msg == "Farmer: Tomato complete...") {
            $this->cannery->money -= 10000;
            $this->farmer->money += 10000;
            $this->cannery->makeKetchup($this->farmer->getTomato());
        } else if ($msg == "Cannery: Ketchup complete...") {
            $this->shop->money -= 15000;
            $this->cannery->money += 15000;
            $this->shop->sellKetchup($this->cannery->getKetchup());
        }
    }
}

/**
 * Farmer implements colleague Farmer
 */
class Farmer extends Colleague
{
    /**
     * @var int
     */
    public $tomato;

    /**
     * @var int|float
     */
    public $money = 5000;

    /**
     * Farmer grows tomatoes
     *
     * @param int $tomato
     */
    public function growTomato($tomato)
    {
        $this->tomato = $tomato;
        $this->money -= 5000;
        $this->mediator->send("Farmer: Tomato complete...");
    }

    /**
     * Give tomatoes
     *
     * @return int
     */
    public function getTomato()
    {
        $tomato = $this->tomato;
        $this->tomato = 0;
        return $tomato;
    }
}


/**
 * Cannery implements colleague Factory
 */
class Cannery extends Colleague
{
    /**
     * @var int
     */
    public $ketchup;

    /**
     * @var int|float
     */
    public $money = 10000;

    /**
     * Factory processes tomatoes into ketchup
     * 4 tomatoes per ketchup package
     *
     * @param int $tomato
     */
    public function makeKetchup($tomato)
    {
        $this->ketchup = $tomato / 4;
        $this->mediator->send("Cannery: Ketchup complete...");
    }

    /**
     * Give ketchup
     *
     * @return int
     */
    public function getKetchup()
    {
        $ketchup = $this->ketchup;
        $this->ketchup = 0;
        return $ketchup;
    }
}

/**
 * Shop implements colleague Shop
 */
class Shop extends Colleague
{
    /**
     * @var int|float
     */
    public $money = 15000;

    /**
     * Shop sells ketchup for 80 rubles
     *
     * @param int $ketchup
     */
    public function sellKetchup($ketchup)
    {
        $this->money = $ketchup * 80;
    }
}
