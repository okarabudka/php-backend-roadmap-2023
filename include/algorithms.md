# Algorithms

## Links

- [Sorting algorithm comparison](https://habr.com/ru/post/274017/)
- [Sorting algorithms overview and performance comparison](https://habr.com/ru/post/335920/)
- [Array sorting](https://ru.hexlet.io/courses/php-arrays/lessons/sorting/theory_unit)
- [Bubble Sort Visualization](https://zenozeng.github.io/bubble-sort-visualization/)
- [Comparison Sorting Algorithms](https://www.cs.usfca.edu/~galles/visualization/ComparisonSort.html)

## Algorithms [&uarr;](#algorithms)

We freely use factories, singletons, and decorators, but often forget about fundamental topics like classic
algorithms. Many of them are patterns in their own right. From university you may remember nested sets, B-trees, and
bubble sort. The implementation of many algorithms has long been standardized.

## Recursion

In general, recursion is a structure where something refers to itself. Recursive algorithms use recursive functions
that have this property.

A practical use of recursion is sorting and transforming tree-like arrays.

There are two kinds of recursion:

- Simple: a function calls itself.
- Complex: a function calls another function, which calls the original function.

Example: if you place two large mirrors facing each other, you see an infinite corridor of reflections. Each mirror
reflects the space in front of it, so this is an example of complex recursion.

### Recursion depth

Recursion depth is the number of nested calls. It can be infinite, which leads to infinite recursion. In practice, the
program will crash with a segmentation fault due to stack overflow. Avoid such constructs. In PHP, functions cannot call
 each other infinitely without crashing. A recursive call must terminate at some depth n.

### Recursive algorithms in PHP

- Factorial
- Fibonacci sequence
- Maximum element in an array
- Tower of Hanoi permutations
- Coin change combinations
- Recursive tree traversal

## Sorting algorithm comparison [&uarr;](#algorithms)

Array sorting is a basic algorithmic task often asked in interviews. In production, arrays are sorted with standard
library functions. Why ask about it? Interviewers typically want to know:

- Whether you know algorithms exist
- Whether you can program
- How your algorithmic thinking works

### Types of sorting algorithms

- Selection sort: scan the array for the minimum element and move it to the front. Complexity O(n^2).

- Bubble sort: swap adjacent elements if the first is greater than the second. Repeat until sorted. Complexity O(n^2).

- Insertion sort: iterate through the array, inserting each element into the sorted part. Complexity O(n^2).

- Quick sort: split the array into two sub-arrays by a pivot (often the middle element). Elements smaller than the pivot
  move left, larger move right. This repeats recursively. Average complexity O(n*log2(n)), worst-case O(n^2).

- Comb sort: similar to exchange sort, but compares elements at a gap (for example, 5 elements apart). This helps move
  small values faster. The gap starts at (array size)/(shrink factor), where the shrink factor is about 1.2473 (often
  rounded to 1.3). The gap is divided by the shrink factor until it reaches 1. Typical complexity O(n*log2(n)).

For unsorted arrays, quick sort is usually the best among these. It uses less memory and is fast for large inputs.

Selection, bubble, and insertion sorts can be useful for teaching and small data sets.

On partially sorted arrays, performance differences shrink, but quick sort is still typically faster and uses less
memory.

These examples show PHP implementations of sorting algorithms, from simple to more efficient.

### 1. Bubble Sort
```php
function bubbleSort($array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Swap elements
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

$array = [64, 34, 25, 12, 22, 11, 90];
print_r(bubbleSort($array));
```

### 2. Selection Sort
```php
function selectionSort($array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }
        // Swap
        $temp = $array[$minIndex];
        $array[$minIndex] = $array[$i];
        $array[$i] = $temp;
    }
    return $array;
}

$array = [64, 25, 12, 22, 11];
print_r(selectionSort($array));
```

### 3. Insertion Sort
```php
function insertionSort($array) {
    $n = count($array);
    for ($i = 1; $i < $n; $i++) {
        $key = $array[$i];
        $j = $i - 1;

        while ($j >= 0 && $array[$j] > $key) {
            $array[$j + 1] = $array[$j];
            $j--;
        }
        $array[$j + 1] = $key;
    }
    return $array;
}

$array = [12, 11, 13, 5, 6];
print_r(insertionSort($array));
```

### 4. Quick Sort
```php
function quickSort($array) {
    if (count($array) < 2) {
        return $array;
    }
    $left = $right = [];
    $pivot = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }
    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

$array = [10, 7, 8, 9, 1, 5];
print_r(quickSort($array));
```

### 5. Merge Sort
```php
function mergeSort($array) {
    if (count($array) <= 1) {
        return $array;
    }

    $middle = count($array) / 2;
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = $j = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    return array_merge($result, array_slice($left, $i), array_slice($right, $j));
}

$array = [12, 11, 13, 5, 6, 7];
print_r(mergeSort($array));
```

## Data structures [&uarr;](#algorithms)

Data structures are programming units for storing and processing multiple related data items. Data can be represented
in different ways. Depending on the data and what you want to do, one representation will work better than another.

It is recommended to learn algorithms at least at a basic level. Data structures are implemented with algorithms, and
algorithms are implemented with data structures.

### Core data structures

- Lists
- Hash table
- Stack
- Queue
- Graph
- Linked list
- Trees
- Binary search tree

Some structures were described earlier in the PHP section:

- [x] [SPL classes](learn-a-language-php.md#spl-classes)
- [x] [What data structures do you know?](learn-a-language-php.md#what-data-structures-do-you-know)
- [x] [Stack vs queue](learn-a-language-php.md#stack-vs-queue)

## Some algorithm questions

### Data structures

1. Difference between Array and LinkedList.
2. How arrays, lists, dictionaries work and how to use them for practical tasks.
3. Trade-offs between memory usage and performance in basic structures. Which operations are easier on arrays vs lists,
   and why. Implementation of hash tables and collision resolution. Priority queues and their implementations.
4. Advanced data structures: B-trees, binomial and Fibonacci heaps, red-black trees, splay trees, skip lists, prefix
   and suffix trees, etc.

### Algorithms

1. Find the average value of numbers in an array.
2. Know the main algorithms for sorting, searching, traversal, and selection.
3. Trees and graphs. Greedy algorithms and divide-and-conquer algorithms (like QuickSort). Understand the meaning of
   levels in the matrix.
4. Recognize and solve dynamic programming tasks, know graph algorithms and computational algorithms. Recognize problem
   complexity classes, etc.
