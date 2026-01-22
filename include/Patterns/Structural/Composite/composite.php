<?php
/**
 * Composite pattern
 */

namespace Pattern;

/**
 * Base abstract class Component describes the interface for tree branches and leaves
 */
abstract class Component
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Constructor
     *
     * @param string $name - file or directory name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Adds an element to a tree branch
     *
     * @param Component $child - child element
     */
    public abstract function add(Component $child);

    /**
     * Returns the component name
     *
     * @return string
     */
    public abstract function name();

    /**
     * Returns child elements
     *
     * @return []Component
     */
    public abstract function childs();

    /**
     * Returns the tree listing
     *
     * @param string $prefix - child element
     *
     * @return string
     */
    public abstract function show($prefix);
}

/**
 * Directory implements tree branches
 */
class Directory extends Component
{
    /**
     * @var []Component
     */
    protected $childs = array();

    /**
     * Adds an element to a tree branch
     *
     * @param Component $child - child element
     */
    public function add(Component $child)
    {
        $this->childs[] = $child;
    }

    /**
     * Returns the tree listing
     *
     * @param string $prefix - child element
     *
     * @return string
     */
    public function show($prefix)
    {
        $result = $prefix . "/" . $this->name() . "\n";
        $childs = $this->childs();

        foreach ($childs as $child) {
            $result .= $child->show($prefix . "/" . $this->name());
        }

        return $result;
    }

    /**
     * Returns the component name
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Returns child elements
     *
     * @return []Component
     */
    public function childs()
    {
        return $this->childs;
    }
}

/**
 * File implements a tree leaf
 */
class File extends Component
{
    /**
     * Adds an element to a tree branch
     *
     * @param Component $child - child element
     */
    public function add(Component $child)
    {
        throw new ErrorException();
    }

    /**
     * Returns child elements
     *
     * @return []Component
     */
    public function childs()
    {
        throw new ErrorException();
    }

    /**
     * Returns the tree listing
     *
     * @param string $prefix - child element
     *
     * @return string
     */
    public function show($prefix)
    {
        return $prefix . "/" . $this->name() . "\n";
    }

    /**
     * Returns the component name
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }
}
