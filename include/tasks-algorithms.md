# Algorithms Tasks

## Determine algorithm complexity

```text
O(n) - linear complexity

Example: find the largest element in an unsorted array. You must scan all n elements to know which is max.

O(log n) - logarithmic complexity

Example: binary search. If the array is sorted, you can check a value by halving the array each step. Check the middle
item. If it is greater, discard the second half. If it is smaller, discard the first half. Continue halving until you
check log n elements.

O(n2) - quadratic complexity

Example: insertion sort. In the canonical implementation you have two nested loops: one to traverse the array, another
to find the place for the next element in the sorted part. The number of operations grows as n * n.

There are other complexity estimates, but they follow the same idea.

Sometimes runtime does not depend on input size. This is O(1). For example, to get the third element of an array you do
not need to traverse. You just take the third element and the time is constant.
```

## Find factorial

```php
function factorial($n): float|int
{
    return $n < 2 ? 1 : $n * factorial($n - 1);
}

echo factorial(5); // 120
```

## Write a function to raise a number to a power using recursion

```php
function degree($n, $degree) {
    return $degree < 2 ? $n : $n * degree($n, $degree - 1);
}

echo degree(5, 3); // 125
```

## Fibonacci sequence

```php
// Recursive Fibonacci
function fib1($n)
{
    return $n < 3 ? 1 : fib1($n - 1) + fib1($n - 2);
}

function fib2($n, $c = 2, $n2 = 0, $n1 = 1)
{
    return $c < $n ? fib2($n, $c + 1, $n1, $n1 + $n2) : $n1 + $n2;
}

// Iterative Fibonacci
function F($n){
  $i=1; $r=1; $l=1; $s=1;
  while($i++<$n){
    $s=$l+$r;
    $l=$r;
    $r=$s;
  }
  return $s;
}

// Recursive Fibonacci using bottom-up DP
function F_recursive($n, $K){
  if($n<=1) {
    return 1;
  } elseif ($K[$n] == 0) {
    $K[$n]=F_recursive($n-1,$K) + F_recursive($n-2,$K);
  }
  return $K[$n];
}
function F($n){
  $K=array_fill(0,$n+1,0);
  return F_recursive($n,$K);
}

// Recursive Fibonacci using OOP
class Fibonachi {
  private $K;
  private function F_recursive($n){
  if($n<=1) {
    return 1;
  } elseif ($this->K[$n] == 0) {
    $this->K[$n]=$this->F_recursive($n-1,$this->K) + $this->F_recursive($n-2,$this->K);
  }
  return $this->K[$n];
  }
  // Class interface
  public function getNumberByIndex($n){
    $this->K=array_fill(0,$n+1,0);
    return $this->F_recursive($n);
  }
}
function F($n){
  $Fibonachi = new Fibonachi();
  return $Fibonachi->getNumberByIndex($n);
}
```

## Hanoi tower permutations

[Hanoi Tower implementation in PHP](https://progtips.ru/php/rekursivnye-algoritmy-na-php-chast-2-polza-rekursii.html)

```php
// Recursive solution for Tower of Hanoi
function towers($n, $a, $c, $b){
  if($n==1){
    echo $a,"->",$c," ";
  } else {
    towers($n-1,$a,$b,$c);
    echo $a,"->",$c," ";
    towers($n-1,$b,$c,$a);
  }
}

// OR THIS WAY
function tower_of_hanoi($numbers, $start, $auxiliary, $end){
    if($numbers == 1){
        echo 'Move disk 1 from rod {' . $start . '} to rod {' . $end . '}' . "\n";
    } else {
        tower_of_hanoi($numbers - 1, $start, $end, $auxiliary);
        echo 'Move disk {' . $numbers . '} from rod {' . $start . '} to rod {' . $end . '}' . "\n";
        tower_of_hanoi($numbers - 1, $auxiliary, $start, $end);
    }
}

tower_of_hanoi(3, 'A', 'B', 'C');
```

## Recursive tree traversal

```php
$tree = mkdir('/', [
  mkdir('etc', [
    mkfile('bashrc'),
    mkfile('consul.cfg'),
  ]),
  mkfile('hexletrc'),
  mkdir('bin', [
    mkfile('ls'),
    mkfile('cat'),
  ]),
]);

function dfs($tree)
{
  // Print node contents
  echo getName($tree) . "\n";
  // If this is a file, return
  if (isFile($tree)) {
      return;
  }

  // Get children
  $children = getChildren($tree);

  // Apply dfs to all children
  // Many recursive calls inside one call is called tree recursion
  array_map(fn($child) => dfs($child), $children);
}

dfs($tree);
// => /
// => etc
// => bashrc
// => consul.cfg
// => hexletrc
// => bin
// => ls
// => cat
```

Questions about arrays:

- Find the second minimum element in an array

```php
Keep two current values `Max` and `Second`
On each step:
  If A[i] >= Max:
     Second = Max
     Max = A[i]
  else if A[i] > Second:
     Second = A[i]
```

- Find the maximum element in an array

```php
Keep `Max`
On each step:
  If A[i] >= Max:
     Max = A[i]
```

- Merge two sorted arrays

```php
$arr1 = [0 => "max",1 => "min",2 => "med"];
$arr2 = [0 => "max",1 => "min",2 => "other",3 =>"med"];

$finalArr = (array_unique(array_merge($arr1, $arr2)));
```

Two numeric variables a and b are given. Swap their values without declaring other variables, using only assignment and
arithmetic operations.

```php
a+=b;
b=a-b;
a-=b;
```

Given a natural number n, using recursion and no loops, output all numbers from 1 to n.

```php
function my_function($n) {
  return $n <= 1? 1 : my_function($n - 1) . ' ' . $n;
}
echo my_function(11); // 1 2 3 4 5 6 7 8 9 10 11
```

Given a string (possibly empty) consisting of letters A-Z:
AAAABBBCCXYZDDDDEEEFFFAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBBBB
Write an RLE function that outputs:
A4B3C2XYZD4E3F3A6B28
and throws an error if the input is invalid.

Explanation: If a character appears once, keep it as-is. If it repeats, append the count.

```python
def convert(s: str) -> str:
  result: List[str] = []
  last_sym = None  # last seen symbol
  count = 0  # how many times we saw it

  # iterate the string and write to result on symbol change
  for sym in (list(s) + [None]):  # last None triggers the final change

      if last_sym and sym != last_sym:  # symbol changed

          if count == 1:
              result.append(last_sym)
          else:
              result.append(last_sym + str(count))

          # start tracking new symbol
          count = 1
          last_sym = sym

      else:  # symbol repeated
          count += 1

  return ''.join(result)
```

Group words by "common letters".
Sample Input ["eat", "tea", "tan", "ate", "nat", "bat"]
Sample Output [ ["ate", "eat", "tea"], ["nat", "tan"], ["bat"] ]

```php
function sortString($str){
    // split the string into letters
    $letters = str_split(strtolower($str));
    // sort letters
    sort($letters);
    // join back
    return implode($letters);
}

// input data
$array = array('rfv', 'vfr', 'abc', 'bac', 'dbatre', 'qwer', 'cba', 'terbda');

// iterate with array_reduce(),
// callback returns a rebuilt array
$grouppedArray = array_reduce($array, function($accumulator, $item) {
    // sort letters in the word
    $itemSorted = sortString($item);
    // store under sorted word key
    // or append if exists
    $accumulator[$itemSorted][] = $item;
    // return for next iteration
    return $accumulator;
});
```
