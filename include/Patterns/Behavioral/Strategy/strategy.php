<?php
/**
 * Strategy pattern
 */

namespace Pattern;

/**
 * StrategySort describes the strategy (algorithm) interface
 */
abstract class StrategySort
{
    /**
     * @param []int $a
     */
    public abstract function sort(&$a);
}

/**
 * BubbleSort implements the bubble sort algorithm
 */
class BubbleSort extends StrategySort
{
    public function sort(&$a)
    {
        $size = count($a);
        if ($size < 2) {
            return;
        }
        for ($i = 0; $i < $size; $i++) {
            for ($j = $size - 1; $j >= $i + 1; $j--) {
                if ($a[$j] < $a[$j - 1]) {
                    $tmp = $a[$j];
                    $a[$j] = $a[$j - 1];
                    $a[$j - 1] = $tmp;
                }
            }
        }
    }
}

/**
 * InsertionSort implements the insertion sort algorithm
 */
class InsertionSort extends StrategySort
{
    public function sort(&$a)
    {
        $size = count($a);
        if ($size < 2) {
            return;
        }
        for ($i = 1; $i < $size; $i++) {
            $j = 0;
            $buff = $a[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($a[$j] < $buff) {
                    break;
                }
                $a[$j + 1] = $a[$j];
            }
            $a[$j + 1] = $buff;
        }
    }
}


/**
 * Context implements the execution context for a strategy
 */
class Context
{
    /**
     * @var StrategySort
     */
    protected $strategy;

    /**
     * Swap the strategy (algorithm)
     */
    public function algorithm(StrategySort $a)
    {
        $this->strategy = $a;
    }

    /**
     * Sort depending on the selected strategy (algorithm)
     */
    public function sort(&$a)
    {
        $this->strategy->sort($a);
    }
}
