<?php
/**
 * Visitor pattern
 */

namespace Pattern;

/**
 * Base abstract class Visitor describes the visitor interface
 */
abstract class Visitor
{
    /**
     * Visit a sushi bar
     *
     * @param SushiBar $p
     *
     * @return string
     */
    public abstract function visitSushiBar(SushiBar $p);

    /**
     * Visit a pizzeria
     *
     * @param Pizzeria $p
     *
     * @return string
     */
    public abstract function visitPizzeria(Pizzeria $p);

    /**
     * Visit a burger bar
     *
     * @param BurgerBar $p
     *
     * @return string
     */
    public abstract function visitBurgerBar(BurgerBar $p);
}

/**
 * Base abstract class Place describes elements the visitor can visit
 */
abstract class Place
{
    /**
     * Visit a place
     * In other words, this is a door into the object for the visitor
     *
     * @param Visitor $v - visitor
     */
    public abstract function accept(Visitor $v);
}

/**
 * People implements a concrete visitor
 */
class People extends Visitor
{
    /**
     * Visit a sushi bar
     *
     * @param SushiBar $p
     *
     * @return string
     */
    public function visitSushiBar(SushiBar $p)
    {
        return $p->buySushi();
    }

    /**
     * Visit a pizzeria
     *
     * @param Pizzeria $p
     *
     * @return string
     */
    public function visitPizzeria(Pizzeria $p)
    {
        return $p->buyPizza();
    }

    /**
     * Visit a burger bar
     *
     * @param BurgerBar $p
     *
     * @return string
     */
    public function visitBurgerBar(BurgerBar $p)
    {
        return $p->buyBurger();
    }
}

/**
 * City implements a structure (collection) that stores elements to visit
 */
class City
{
    /**
     * @var []Place - places to visit
     */
    public $places = array();

    /**
     * Adds a place to the collection
     *
     * @param Place $p - place to visit
     */
    public function add(Place $p)
    {
        $this->places[] = $p;
    }

    /**
     * Visit all places in the city
     *
     * @param Visitor $v - visitor
     *
     * @return string
     */
    public function accept(Visitor $v)
    {
        $result = array();
        foreach ($this->places as $p) {
            $result[] = $p->accept($v);
        }
        return join("", $result);
    }
}

/**
 * SushiBar implements a sushi bar element
 */
class SushiBar extends Place
{
    /**
     * Visit a place
     * In other words, this is a door into the object for the visitor
     *
     * @param Visitor $v - visitor
     */
    public function accept(Visitor $v)
    {
        return $v->visitSushiBar($this);
    }

    /**
     * Buy sushi
     */
    public function buySushi()
    {
        return "Buy sushi...";
    }
}

/**
 * Pizzeria implements a pizzeria element
 */
class Pizzeria extends Place
{
    /**
     * Visit a place
     * In other words, this is a door into the object for the visitor
     *
     * @param Visitor $v - visitor
     */
    public function accept(Visitor $v)
    {
        return $v->visitPizzeria($this);
    }

    /**
     * Buy pizza
     */
    public function buyPizza()
    {
        return "Buy pizza...";
    }
}

/**
 * BurgerBar implements a burger bar element
 */
class BurgerBar extends Place
{
    /**
     * Visit a place
     * In other words, this is a door into the object for the visitor
     *
     * @param Visitor $v - visitor
     */
    public function accept(Visitor $v)
    {
        return $v->visitBurgerBar($this);
    }

    /**
     * Buy burger
     */
    public function buyBurger()
    {
        return "Buy burger...";
    }

}
