<?php
/**
 * Template Method pattern
 */

namespace Pattern;

/**
 * Base abstract class AbstractQuotes describes the interface for different quote styles
 */
abstract class AbstractQuotes
{
    /**
     * Template Method
     *
     * @param string $str - string
     *
     * @return string
     */
    public function quotes($str)
    {
        return $this->open() . $str . $this->close();
    }

    /**
     * Opening quote
     *
     * @return string
     */
    public abstract function open();

    /**
     * Closing quote
     *
     * @return string
     */
    public abstract function close();
}

/**
 * FrenchQuotes wraps the string in French quotes (guillemets)
 */
class FrenchQuotes extends AbstractQuotes
{
    /**
     * Opening quote
     *
     * @return string
     */
    public function open()
    {
        return "«";
    }

    /**
     * Closing quote
     *
     * @return string
     */
    public function close()
    {
        return "»";
    }
}


/**
 * GermanQuotes wraps the string in German quotes
 */
class GermanQuotes extends AbstractQuotes
{
    /**
     * Opening quote
     *
     * @return string
     */
    public function open()
    {
        return "„";
    }

    /**
     * Closing quote
     *
     * @return string
     */
    public function close()
    {
        return "“";
    }
}
