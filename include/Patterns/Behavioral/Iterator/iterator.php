<?php
/**
 * Iterator pattern
 */

namespace Pattern;

/**
 * Iterator interface describes the common interface for iterators.
 */
interface Iterator
{
    /**
     * Returns the next element
     *
     * @return mixed
     */
    public function next();

    /**
     * Checks availability of the next element
     *
     * @return bool
     */
    public function hasNext();
}

/**
 * Aggregate interface describes the common interface for collections.
 */
interface Aggregate
{
    /**
     * Creates and returns an iterator for the collection
     *
     * @return Iterator
     */
    public function iterator();
}

/**
 * BookIterator (ConcreteIterator) implements an iterator for the bookshelf
 */
class BookIterator implements Iterator
{
    /**
     * @var BookShelf
     */
    protected $shelf;

    /**
     * @var int
     */
    protected $current = 0;

    /**
     * Constructor
     *
     * @param BookShelf $shelf - bookshelf
     */
    public function __construct(BookShelf $shelf)
    {
        $this->shelf = $shelf;
    }

    /**
     * Returns the next element
     *
     * @return mixed
     */
    public function next()
    {
        return $this->shelf->books[$this->current++];
    }

    /**
     * Checks availability of the next element
     *
     * @return bool
     */
    public function hasNext()
    {
        return ($this->current < count($this->shelf->books));
    }
}

/**
 * BookShelf (ConcreteAggregate) implements a bookshelf (collection of elements)
 */
class BookShelf implements Aggregate
{
    /**
     * @var []Book
     */
    public $books = array();

    /**
     * Creates and returns an iterator for the collection
     *
     * @return Iterator
     */
    public function iterator()
    {
        return new BookIterator($this);
    }

    /**
     * Adds an element to the collection
     *
     * @param Book $book - book (collection element)
     */
    public function add(Book $book)
    {
        $this->books[] = $book;
    }
}

/**
 * Book implements a collection element
 */
class Book
{
    /**
     * @var string
     */
    public $name;

    /**
     * Constructor
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
