# PHP Tasks

#### Write an example of anonymous classes

```php
// Anonymous classes are useful for simple one-off objects.

// Using a named class
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// Using an anonymous class
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
```

#### array_walk and closures

```php
$fruits = [
    "d" => "lemon",
    "a" => "orange",
    "b" => "banana",
    "c" => "apple"
];

array_walk($fruits, function($item, $key) {
    echo $key . ' => ' . $item . "\n";
});
```

#### yield, fibers, coroutines

```php
function generate() {
    $fruits = [
        "d" => "lemon",
        "a" => "orange",
        "b" => "banana",
        "c" => "apple"
    ];

    foreach ($fruits as $fruit) {
        yield $fruit;
    }
}

$generator = generate();
foreach ($generator as $value) {
    echo "$value\n";
}
```

#### preg_replace

```php
$p = array('/a/', '/b/', '/c/');
$r = array('b', 'c', 'd');
print_r(preg_replace($p, $r, 'a'));
// prints d

$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
// prints April1,2003
```

#### Write a Singleton pattern example

```php

```

#### Write a factorial function (recursion / iteration)

```php
function factorial($n): float|int
{
    return $n < 2 ? 1 : $n * factorial($n - 1);
}

echo factorial(5); // 120
```

#### Bubble sort, algorithm complexity

```php
function bubbleSort($coll)
{
    $size = count($coll);
    do {
        $swapped = false;
        // Iterate the array and swap elements if the previous one
        // is greater than the next
        for ($i = 0; $i < $size - 1; $i++) {
            if ($coll[$i] > $coll[$i + 1]) {
                $temp = $coll[$i];
                $coll[$i] = $coll[$i + 1];
                $coll[$i + 1] = $temp;
                $swapped = true;
            }
        }
        // Decrease size by 1, because the largest element is now at the end
        $size--;
    } while ($swapped); // continue while swapped === true

    return $coll;
}

print_r(bubbleSort([3, 2, 10, -2, 0]));
// => Array
// => (
// =>     [0] => -2
// =>     [1] => 0
// =>     [2] => 2
// =>     [3] => 3
// =>     [4] => 10
// => )
```

#### Difference between results of

```php
$aparts = $aparts + $filedata;
$aparts = array_merge($aparts, $filedata);

// If you want to append elements of the second array to the first without
// overwriting the first array elements and without reindexing, use the + operator.
// Keys from the first array are preserved. If a key exists in both arrays,
// the element from the first array is used and the element from the second is ignored.
```

#### Factorial

```php
function factorial($n): float|int
{
    return $n < 2 ? 1 : $n * factorial($n - 1);
}

echo factorial(6) . "\n";
```

#### Recursion

We have a set of lemonade package types, and each type holds a certain number of bottles.
We need to determine how many packages to sell to a customer who wants to buy a certain number of bottles.
If the number of bottles is less than the smallest package, return one package because we do not sell bottles
individually.

```php
/*
solution with a set of package types as constants
*/

const BIG = 20;
const MIDDLE = 6;
const SMALL = 2;

function packCount($bottles = 0, $count = 0): int
{
    switch ($bottles) {
        case $bottles >= BIG:
            $count += intdiv($bottles, BIG);
            if ($bottles % BIG > 0) {
                $count += packCount($bottles % BIG);
            }
            break;
        case $bottles >= MIDDLE:
            $count += intdiv($bottles, MIDDLE);
            if ($bottles % MIDDLE > 0) {
                $count += packCount($bottles % MIDDLE);
            }
            break;
        case $bottles >= SMALL:
            $count += intdiv($bottles, SMALL);
            if ($bottles % SMALL > 0) {
                $count += packCount($bottles % SMALL);
            }
            break;
        case $bottles < SMALL && $bottles > 0:
            return 1;
        default:
            return 0;
    }
    return $count;
}

echo packCount(55) . " \n\n";

/*
solution with a set of package types as a dynamic parameter
*/

function packCount2(int $bottles, array $packs): int
{
    $count = 0;

    arsort($packs);

    foreach ($packs as $key => $pack) {
        if ($bottles >= $pack) {
            $count += intdiv($bottles, $pack);

            if ($bottles % $pack > 0) {
                $count += packCount2($bottles % $pack, array_splice($packs, $key));
            }
            return $count;
        }
    }

    if ($bottles > 0) {
        return 1;
    }

    return $count;
}

echo packCount2(55, [20, 2, 6]) . " \n\n\n";
```
