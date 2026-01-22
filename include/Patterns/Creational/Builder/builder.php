<?php
/**
 * Builder pattern
 */

namespace Pattern;

/**
 * Base abstract class Builder describes the builder interface.
 * The builder must follow it to build a concrete product.
 */
abstract class Builder
{
    /**
     * Builds the document header
     *
     * @param string $str - text
     */
    public abstract function makeHeader($str);

    /**
     * Builds the main document content
     *
     * @param string $str - text
     */
    public abstract function makeContent($str);

    /**
     * Builds the document footer
     *
     * @param string $str - text
     */
    public abstract function makeFooter($str);
}

/**
 * Director implements the builder manager.
 * Accepts a builder and directs it.
 */
class Director
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * Constructor
     *
     * @param Builder $builder - worker
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Construct method tells the builder what to do
     * in the correct sequence.
     */
    public function construct()
    {
        $this->builder->makeHeader("Header");
        $this->builder->makeContent("Content");
        $this->builder->makeFooter("Footer");
    }
}

/**
 * Concrete builder.
 * Can build parts of the product.
 */
class ConcreteBuilder extends Builder
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * Constructor
     *
     * @param Product $product - product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Builds the document header
     *
     * @param string $str - text
     */
    public function makeHeader($str)
    {
        $this->product->header = "<header>" . $str . "</header>\n";
    }

    /**
     * Builds the document content
     *
     * @param string $str - text
     */
    public function makeContent($str)
    {
        $this->product->content = "<article>" . $str . "</article>\n";
    }

    /**
     * Builds the document footer
     *
     * @param string $str - text
     */
    public function makeFooter($str)
    {
        $this->product->footer = "<footer>" . $str . "</footer>\n";
    }
}

/**
 * Complex product.
 * There are implementations without it, when the builder builds directly,
 * instead of creating a product object and then constructing it.
 */
class Product
{
    public $header;
    public $content;
    public $footer;

    /**
     * Show product
     *
     * @return string
     */
    public function show()
    {
        $result = $this->header;
        $result += $this->content;
        $result += $this->footer;
        return $result;
    }
}
