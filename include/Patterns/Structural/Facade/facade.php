<?php
/**
 * Facade pattern
 */

namespace Pattern;

/**
 * Man implements the facade
 * The man contains:
 */
class Man
{
    /**
     * @var House
     */
    public $house;

    /**
     * @var Tree
     */
    public $tree;

    /**
     * @var Child
     */
    public $child;

    /**
     * Constructor. Creates the man
     */
    public function __construct()
    {
        $this->house = new House();
        $this->tree = new Tree();
        $this->child = new Child();
    }

    /**
     * What the man must do
     *
     * @return string
     */
    public function todo()
    {
        $result = [
            $this->house->Build(),
            $this->tree->Grow(),
            $this->child->Born(),
        ];

        return join("\n", $result);
    }
}

/**
 * House implements the \"House\" subsystem
 */
class House
{
    /**
     * Building a house
     */
    public function build()
    {
        return "Build house";
    }
}

/**
 * Tree implements the \"Tree\" subsystem
 */
class Tree
{
    /**
     * Planting a tree
     *
     * @return string
     */
    public function grow()
    {
        return "Tree grow";
    }
}

/**
 * Child implements the \"Child\" subsystem
 */
class Child
{
    /**
     * Having children :)
     *
     * @return string
     */
    public function born()
    {
        return "Child born";
    }
}
