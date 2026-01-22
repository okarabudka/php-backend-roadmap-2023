<?php
/**
 * Decorator pattern
 */

namespace Pattern;

/**
 * Component describes the interface for the decorator and component
 */
abstract class Component
{
    public abstract function Operation();
}

/**
 * ConcreteComponent implements the component
 */
class ConcreteComponent extends Component
{
    /**
     * Operation the component performs by itself
     *
     * @return string
     */
    public function operation()
    {
        return "I am component!";
    }
}

/**
 * ConcreteDecorator implements the decorator
 */
class ConcreteDecorator extends Component
{
    /**
     * @var Component
     */
    protected $component;

    /**
     * Constructor
     *
     * @param Component $component - component
     */
    public function __construct($component)
    {
        $this->component = $component;
    }

    /**
     * Decorator wraps the component operation in a <strong> tag
     *
     * @return string
     */
    public function operation()
    {
        return "<strong>" . $this->component->operation() . "</strong>";
    }
}
