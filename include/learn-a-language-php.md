# PHP

#### Links

- [PHP syntax evolution](https://wp-kama.ru/id_6310/php-evolution.html#php-8-1)
- [PHP: change log](https://www.php.net/manual/ru/doc.changelog.php)
- [PHP Versions](https://php.watch/versions)
- [PHP | endoflife.date](https://endoflife.date/php)
- [What's new in PHP 8.0](https://www.php.net/releases/8.0/ru.php)
- [What's new in PHP 8.1](https://www.php.net/releases/8.1/ru.php)
- [What's new in PHP 8.2](https://www.php.net/releases/8.2/ru.php)
- [PHP 8.2 released: key changes](https://habr.com/ru/company/hexlet/blog/705194/)
- [Language reference](https://www.php.net/manual/ru/langref.php)
- [PHP Reflection API](https://php.zone/oop-v-php-prodvinutyj-kurs/php-reflection-api-uchimsya-primenyat)
- [SPL digest lecture](https://devenergy.ru/archives/288)
- [Data structures (via PHP SPL)](https://medium.com/@alexawesome/%D1%81%D1%82%D1%80%D1%83%D0%BA%D1%82%D1%83%D1%80%D1%8B-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D0%BD%D0%B0-%D0%BF%D1%80%D0%B8%D0%BC%D0%B5%D1%80%D0%B5-php-spl-9a98bc08b6c0)
- [Data structures](https://www.php.net/manual/ru/spl.datastructures.php)
- [Handling exceptions and errors in PHP](https://maxsite.org/page/exception-in-php)
- [Anonymous functions](https://www.php.net/manual/ru/functions.anonymous.php)
- [Pseudo-types and variables used in documentation](http://php.adamharvey.name/manual/ru/language.pseudo-types.php)
- [Asynchrony, concurrency, parallelism, multithreading](https://habr.com/ru/post/667590/)
- [How to use AJAX in PHP and jQuery](https://code.tutsplus.com/ru/tutorials/how-to-use-ajax-in-php-and-jquery--cms-32494)
- [Generator syntax](https://www.php.net/manual/ru/language.generators.syntax.php)
- [Real-world generator examples](https://badtry.net/primiery-ispolzovaniia-ghienieratorov-v-php/)
- [Event-driven architecture](https://habr.com/ru/post/699492/)
- [Interfaces and signature compatibility](https://habr.com/ru/post/328890/)
- [OOP principles](https://habr.com/ru/company/otus/blog/525336/)
- [OOP in PHP](https://maxsite.org/page/php-oop)
- [Variable scope](https://www.php.net/manual/ru/language.variables.scope.php)
- [Visibility of properties, methods, and constants](https://www.php.net/manual/ru/language.oop5.visibility.php)
- [Interfaces vs abstract classes](https://www.dev-notes.ru/articles/interfaces-vs-abstract-classes-in-php/)
- [Overloading](https://www.php.net/manual/ru/language.oop5.overloading.php)
- [Constructors and destructors](https://www.php.net/manual/ru/language.oop5.decon.php)
- [Traits](https://www.php.net/manual/ru/language.oop5.traits.php)
- [PHP: the static keyword](https://habr.com/ru/post/259627/)
- [Anonymous classes](http://micmap.org/php-by-example/manual/ru/language.oop5.anonymous.html)

## PHP: Hypertext Preprocessor (or simply PHP)

- [Cookies and sessions](#cookies-and-sessions)
- [PHP versions](#php-versions)
- [Reflection API](#reflection-api)
- [What are PEAR and PECL?](#what-are-pear-and-pecl)
- [Error handling](#error-handling)
- [Data types in PHP](#data-types-in-php)
- [Pseudotypes](#pseudotypes)
- [Anonymous functions and closures](#anonymous-functions-and-closures)
- [Name 5 array functions](#name-5-array-functions)
- [Array sorting functions](#array-sorting-functions)
- [!empty() vs isset()](#empty-vs-isset)
- [include vs require](#include-vs-require)
- [Misc](#misc)

## Design

- [What is MVC and what are its benefits?](#what-is-mvc-and-what-are-its-benefits)
- [Should there be logic in the controller, and why?](#should-there-be-logic-in-the-controller-and-why)

## Data Structures

- [SPL Classes](#spl-classes)
- [What data structures do you know?](#what-data-structures-do-you-know)
- [Stack vs Queue](#stack-vs-queue)

## DB

- [Are you familiar with ORM and ActiveRecord?](#are-you-familiar-with-orm-and-activerecord)
- [What is PDO and prepared statements?](#what-is-pdo-and-prepared-statements)

## OOP

- [Three OOP principles](#three-oop-principles)
- [OOP in PHP](#oop-in-php)
- [Visibility](#visibility)
- [Interface vs abstract class](#interface-vs-abstract-class)
- [Multiple constructors in a class](#multiple-constructors-in-a-class)
- [Traits - why](#traits-why)
- [Can you do multiple inheritance in PHP?](#can-you-do-multiple-inheritance-in-php)
- [Static properties and methods](#static-properties-and-methods)

## Asynchrony, concurrency, parallelism, multithreading in PHP

- [Asynchrony, concurrency, parallelism, multithreading in PHP](#asynchrony-concurrency-parallelism-and-multithreading-in-php)
- [Event loop](#event-loop)
- [Event-driven in Symfony - is it async?](#event-driven-in-symfony---is-it-async)
- [Distributed asynchrony](#distributed-asynchrony)
- [Cooperative multitasking with generators and coroutines](#cooperative-multitasking-with-generators-and-coroutines)
- [yield](#yield)
- [Coroutines](#coroutines)
- [Fibers](#fibers)
- [The blocking code problem](#the-blocking-code-problem)
- [Real parallelism - processes](#real-parallelism---processes)
- [Multithreading](#multithreading)
- [Swoole and its go-routines](#swoole-and-its-go-routines)

## Cookies and Sessions

In PHP, cookies and sessions are mechanisms for storing user data, but they work differently and are used for different
purposes.

### 1. Data storage location

- Cookies: data is stored on the client (user browser). The browser sends cookies with each request to the same domain.
- Sessions: data is stored on the server. The client stores only the session ID as a cookie (or in the URL), which
  links the user to the server-side session.

### 2. Security

- Cookies: less secure because they are stored on the client and can be modified or stolen (for example via XSS).
- Sessions: more secure because data is stored on the server. The client only gets the session ID.

### 3. Lifetime

- Cookies: can be long-lived, even years, until deleted by the user or expired.
- Sessions: usually live until the browser is closed or the session expires on the server.

You can set cookie lifetime via Expires (date/time) or Max-Age (seconds). A session cookie lives only for the session
and is removed when the client closes.

If the `expire` parameter is not set, the cookie lives until the browser closes. If it is set, the cookie deletes itself
when the time is reached.

### 4. Data size

- Cookies: typically limited to 4 KB.
- Sessions: no hard size limit, constrained only by server resources.

### 5. Usage

- Cookies: store long-lived user data, preferences, or "remember me" auth.
- Sessions: store temporary user data during interaction (shopping cart, temporary auth state).

### Example

- Cookies are useful for long-term user info (remember a user).
- Sessions are useful for temporary data during an active session.

## PHP Versions

### PHP 1 (Personal Home Page Tools)

PHP was developed by Rasmus Lerdorf in 1995. The name still referred to personal home page tools and was originally a
replacement for Perl scripts used to log visits to his online resume.

### PHP / FI (PHP 2)

Lerdorf built a larger version in C, which PHP is still written in today. The released PHP/FI (FI means Form
Interpreter) was similar to Perl but more limited.

### PHP 3

Andi Gutmans and Zeev Suraski rewrote PHP 3 in 1997. The earlier PHP/FI code was considered inadequate for ecommerce.
Lerdorf joined Gutmans and Suraski, and PHP/FI development stopped. PHP 3 was a major step in popularizing PHP as a web
scripting language.

### PHP 4

Zend Technologies (founded by Gutmans and Suraski) developed Zend Engine 1, which underlies PHP 4. PHP 4 improved
execution speed, security with globals, support for more web servers, session management, output buffering, and more.

In the late 1990s the web grew rapidly and needed a scripting language for dynamic pages. PHP became more popular for
web development than Perl and was easier to learn. Support for PHP 4 ended in 2008.

### PHP 5

PHP 5 was released on July 13, 2004. It introduced Zend Engine 2, improved interpreter efficiency, added XML support,
and significantly reworked OOP to be more like Java. It introduced destructors, visibility, final members, interfaces,
cloning, and more. Changes aimed to keep backward compatibility. The last stable branch is PHP 5.6, which included:

- Performance improvements of about 10-20%
- Namespaces
- Late static binding and __callStatic()
- Lambda functions and closures
- Extensions: intl, phar, fileinfo, sqlite3
- Optional garbage collector
- MySQLnd driver for MySQL, improving performance and included by default
- Dropped support for OS versions before Windows 2000 (Windows 98, NT4, etc)
- New syntax like NOWDOC, limited GOTO, short ternary operator

PHP 5.3:

- `?:` short ternary operator
- `$func = function() use () { }` anonymous functions
- `method()->var` object from method/function
- `<<<'DOC'` NOWDOC support
- `namespace`
- `__DIR__` magic constant
- `$class::$foo` dynamic class name
- `const` for constants outside classes
- `static::method()` late static binding
- `goto hell;` goto operator
- `__callStatic(), __invoke()` magic methods

PHP 5.4:

- `<?=` short echo always available
- `[1,2]` short array syntax
- `trait Class {}` traits
- `foo()[0]` array dereference
- `(new Foo)->method()` access object on creation
- `Class::{'foo'}()` dynamic method name
- `callable` type hint
- `@` improved performance

PHP 5.5:

- `[1,3,4][2]`, `"foobar"[2]` array/string dereference
- `empty()` works on expressions
- `list()` in foreach
- `finally` in try/catch
- `Class::class` class name
- `yield` generators
- Password hashing API

PHP 5.6:

- `const PLUS = 1 + 2;` scalar expressions in constants
- `const ARR = ['a', 'b'];` array constants
- `func(...$args)` or `func(...[2, 3])` argument unpacking
- `**` exponentiation operator
- `use function` and `use const` imports

### PHP 6

PHP 6 development started in 2006 and included many changes such as removing POSIX regex, removing long superglobals,
and removing safe_mode, magic_quotes_gpc, and register_globals from php.ini.

The main focus was Unicode support, but in 2010 PHP 6 was abandoned due to complexity. The PHP 6 code moved to a branch
and PHP 5.4 became the main line.

### PHP 7

In 2014, a vote chose the name PHP 7. The release was planned for October 2015. Zend presented an infographic with key
changes.

PHP 7 runs about 30% faster than PHP 5 due to new hash tables. It also uses less memory. The parser, lexer, and bytecode
generator changed. PHP 7.0 released in December 2015, 7.1 in December 2016, 7.2 in December 2017, and 7.4 in November
2019.

PHP 7 was based on the experimental phpng branch (PHP Next Generation), focused on speed and lower memory usage. It
added return type declarations, argument type enforcement, and new operators.

PHP 7:

- `$a ?? ''` null coalescing
- `$a <=> $b` spaceship operator (three-way compare)
- `define('FOO', [1,2]);` array constants in define
- `use name\space\{A, B, C as c};` grouped imports
- `int, float, bool` parameter types
- `int, float, bool, array` return types
- `foo()(), $a::$b::$c, $$foo->bar` uniform variable syntax (left to right)
- `foreach` behavior changes
- `$class = new class {}` anonymous classes
- `yield ... return 99;` generator returns
- `yield from func()` generator delegation

PHP 7.1:

- `?string` nullable types
- `void` return type
- `['key' => $var] = ['key' => 'Value']` array destructuring
- `list('id' => $id) = $data` list() with keys
- `Closure::fromCallable()`
- `private const` visibility for class constants
- `iterable` pseudo-type
- `?int = null` nullable arguments/returns
- `$string[-1]` negative string offsets
- `catch (First | Second $e)` multi-catch

PHP 7.2:

- Trailing comma for any list syntax

PHP 7.3:

- Improved heredoc and nowdoc syntax
- `list(&$a)` references in list()
- `is_countable()`
- `array_(key|value)_(first|last)()` new functions

PHP 7.4:

- `[ ...$arr ]` array unpacking inside arrays
- `public int $id` typed properties
- `fn($x) => $x` arrow functions
- Covariance and contravariance
- `??=` coalesce assign operator
- `299_792` numeric separators
- `WeakReference`
- `strip_tags($str, ['a', 'p'])`
- `__serialize()` and `__unserialize()`
- `array_merge()` with no arguments
- Exceptions from `__toString()`

### PHP 8

PHP 8 was released in late November 2020. It supports JIT, which improves micro-benchmark performance. PHP 8 provides
WeakRefs for memory-efficient object handling and supports union types.

PHP 8.0:

- Union types. A function argument or return can be `int|float`, for example.
- JIT (Just-In-Time compilation) speeds up code by compiling to machine code at runtime.
- `$country = $session?->user?->getAddress()?->country;` nullsafe operator for chained calls.
- `htmlspecialchars($string, double_encode: false);` named arguments.
- Attributes add metadata with native syntax.
- Weak maps associate objects with metadata without preventing GC.
- Match expressions: flexible value matching, similar to switch but more expressive.
- Constructor property promotion: define and initialize properties in the constructor.
- Saner string-to-number comparisons.
- `str_contains`, `str_starts_with`, `str_ends_with`.
- Allow `::class` on objects (no need for get_class).
- Static return type.
- WeakMap class.
- Deprecate left-associative ternary operator.
- Change precedence of concatenation operator.
- Allow trailing comma in parameter list.
- `Stringable`.
- `throw` is an expression; catch without a variable is allowed if you do not use it.
- Stable sorting.
- Non-capturing catches.
- Ensure correct signatures of magic methods.
- Always available JSON extension.
- Stricter type checks for arithmetic/bitwise operators.
- Validation for abstract trait methods.
- Field types and links.
- `mixed` type v2.

PHP 8.1:

- Enums.
- Readonly properties for immutable objects like VO/DTO.
- First-class callable syntax.
- Extended object initialization: objects allowed as default values and attribute arguments.
- Intersection types: `Iterator&Countable`.
- `never` return type for functions that do not return.
- Final class constants.
- Fibers for cooperative concurrency.
- Array unpacking with string keys.

PHP 8.2:

- Readonly classes: `readonly class BlogData {}`
- DNF types: `public function bar((A&B)|null $entity) { }`
- Standalone `null`, `false`, and `true` types
- New `Random` module
- Trait constants (accessible via classes, not traits)
- Dynamic properties deprecated unless `#[\AllowDynamicProperties]`

## Reflection API

Reflection in programming lets a program inspect and modify its own structure and behavior at runtime. The term comes
from psychology: self-analysis and changing behavior based on it.

Reflection allows a program to track and modify its structure during execution.

PHP has a powerful reflection toolkit. Language features like `self`, `static`, `__DIR__`, `__CLASS__`,
`get_defined_vars()`, `func_get_args()`, or `eval()` are reflection tools.

You can instantiate a class from a variable:

    $obj = new $className();

And call a method by name:

    $obj->$methodName();

PHP has a full Reflection API for classes, interfaces, functions, methods, and modules. It also allows reading doc
comments.

Reflection classes:

- ReflectionClass: info about a class
- ReflectionFunction: info about a function
- ReflectionParameter: info about a function or method parameter
- ReflectionClassConstant: info about a class constant

## What Are PEAR and PECL?

- PEAR (PHP Extension and Application Repository) is an open-source PHP class library. It is effectively a predecessor
  to Composer. It adds external PHP libraries system-wide rather than per project.
- PECL (PHP Extension Community Library) is a repository of PHP modules written in C, available through PEAR. It was
  created to host modules removed from the core distribution. Modules in PECL are compiled extensions. For example, you
  can install a memcache API via PECL or via OS packages.

Personally, it is better to install via OS packages if possible because the package manager tracks dependencies and
updates. If you install via PECL, be ready for manual reinstalls.

## Error Handling

```php
try {
    // protected code
} catch (Exception $e) {
    // handle exception
} finally {
    // always runs
}
```

Not all errors are exceptions.

PHP errors are predefined constants like E_ERROR, E_WARNING, E_NOTICE. E_WARNING is not an exception because the
program can continue. Exceptions represent abnormal situations you want to catch and handle.

For example, division by zero is invalid input handling, not necessarily a fatal crash.

## Data Types in PHP

PHP has ten basic data types:

- `bool` (boolean)
- `int` (integer)
- `float` (float)
- `string`
- `array`
- `object`
- `callable`
- `mixed`
- `resource`
- `null` (no value)

The first four are scalar types: bool, int, float, string.

## Pseudotypes

- `mixed`: can accept many types (not necessarily all).
- `number`: int or float.
- `callback`: used before `callable` was introduced in PHP 5.4; same meaning.
- `array|object`: array or object.
- `void`: return value is useless. As a parameter, means no parameters. Since PHP 7.1, allowed as return type.

## Anonymous Functions and Closures

Anonymous functions (closures) allow creating functions without names. They are useful as callbacks and for many other
cases.

Anonymous functions are implemented with the `Closure` class. They return instances of this class, which provides
methods to control the closure after creation.

```php
$message = 'hello';

$example = function () use ($message) {
    var_dump($message);
};
$example();
```

Automatic binding of `$this`:

```php
class Test
{
    public function testing()
    {
        return function() {
            var_dump($this);
        };
    }
}

$object = new Test;
$function = $object->testing();
$function();
```

## Name 5 Array Functions

- `array_chunk` - splits an array into chunks of a given size
- `array_combine` - combines an array of keys with an array of values
- `array_diff` - elements in the first array that are not in others
- `array_intersect` - elements that exist in all arrays
- `array_key_exists` - checks if a key exists
- `array_keys` - returns keys
- `array_merge` - merges arrays
- `array_pop` - removes and returns last element
- `array_push` - adds elements to the end

## Array Sorting Functions

- `arsort` - sort by values descending, preserve keys
- `asort` - sort by values ascending, preserve keys
- `krsort` - sort by keys descending
- `ksort` - sort by keys ascending
- `sort` - sort by values ascending, reindex
- `usort` - sort with a custom comparison function
- `rsort` - sort by values descending, reindex

## !empty() vs isset()

- `isset()` checks if a variable is set and not null. Returns true if it exists and is not null.
- `empty()` checks existence and emptiness. Returns false if the variable exists and has a non-empty value or true.

## include vs require

Both include and require are similar. The difference is that `include()` raises a warning and the script continues,
while `require()` raises a warning and a fatal error, so the script stops.

## Misc

### Global variables

PHP has global variables, but first recall local variables. A local variable is defined inside a function and is
accessible only within that function.

Superglobals are built-in variables always available in all scopes. You do not need `global $variable` to access them.

Superglobals include:

- `$GLOBALS`
- `$_SERVER`
- `$_GET`
- `$_POST`
- `$_FILES`
- `$_COOKIE`
- `$_SESSION`
- `$_REQUEST`
- `$_ENV`

### Variable naming rules

There are three common styles, often combined, for multi-word names:

- `kebab-case` - words separated by hyphens, e.g. my-super-var.
- `snake_case` - words separated by underscores, e.g. my_super_var.
- `CamelCase` - each word capitalized, e.g. MySuperVar.
- `lowerCamelCase` - like CamelCase, but first letter is lowercase, e.g. mySuperVar.

In PHP, CamelCase and lowerCamelCase are used. Variables use lowerCamelCase. Words are concatenated, with each word
except the first capitalized: `$userName`. With three words: `$mySuperVariable`.

A common rule: avoid transliteration, use English. Use a translator if needed. Over time you will learn standard naming
conventions.

Names should convey meaning and follow language syntax rules, even if not enforced by the compiler.

### Ternary operators

https://stitcher.io/blog/shorthand-comparisons-in-php

### Error display

How to enable PHP error display:

1) Via .htaccess

Add to .htaccess:

```
php_flag display_errors on
php_value error_reporting 2047
```

2) Via php.ini

Set in php.ini:

```
display_errors = On
error_reporting = E_ALL
```

3) Via PHP script

Use `error_reporting()`:

```php
// Disable error reporting
error_reporting(0);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL)
ini_set('error_reporting', E_ALL);

// Report some errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Same as above, plus E_NOTICE
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
```

After debugging, disable error display.

### Server error logs

All PHP settings, including version, are in php.ini. Logging can be enabled there or via the control panel.

Example:

```
display_errors = Off
log_errors = On
error_log = /var/log/php-errors.log
```

When display_errors is enabled, errors are shown on screen. `error_log` sets the log file path for debugging.

### Three differences between hash functions and encryption

Hashing and encryption are often used interchangeably, but they are different.

A hash is a value generated from input text. A fixed-length output changes significantly with small input changes.
Strong hashing is one-way: you cannot recover the original input.

Popular hashing algorithms:

- `MD5` is widely known. It produces a 16-byte hash represented as a 32-character hex string. MD5 has known weaknesses
  and many collisions, so it is outdated.
- `SHA` has SHA-0, SHA-1, and SHA-2. SHA-0 is rarely used. SHA-1 produces a 20-byte hash. SHA-2 is stronger; SHA-256 or
  higher is recommended for security-critical cases.

When should you use hashing?

Hashing is ideal for storing passwords because hashes are one-way. With a strong algorithm and a salt, it is hard to
reverse.

Store passwords as salted hashes. When a user logs in, hash the input and compare to the stored hash. If they match, the
password is correct.

Hashing is also great for comparing stored values without keeping plaintext. Examples: verify last digits of a card, or
compare file hashes to detect changes.

Encryption transforms data into unreadable text of variable length.

The main principle of encryption is that there is a recipient who can decrypt.

The key difference: encrypted data can be decrypted back to the original with the right key.

There are two main types: symmetric and public-key (asymmetric) encryption.

In symmetric encryption, the same key encrypts and decrypts.

In public-key encryption, one key encrypts (public) and one decrypts (private). The public key is available to anyone
who wants to encrypt, but only the recipient has the private key to decrypt.

Popular algorithms:

- `AES` is the gold standard for symmetric encryption, typically with 256-bit keys.
- `PGP` is a popular public-key encryption algorithm.

When should you use encryption?

Use encryption when you need the recipient to decrypt the message. For secure messages, use encryption, not hashing.

If the original data must not be known, use hashing because it is safer.

For internet communication:

- encryption is used to prevent others from reading your message
- hashing is used to prevent silent modification of your message

### OOP - object lifecycle

https://newobj.ru/oop/chapter.php?n=2-2

An object (instance) is an addressable memory area that stores values of all fields of a class.

Any object has a lifecycle: 1) created, 2) lives, 3) deleted. Creating an object allocates and initializes memory for
fields. Deleting an object frees that memory.

### Writing a tech audit

A tech audit is a short summary of the current project state with major and minor issues the executor must fix for the
work to be considered complete.

- code validity and compliance with framework docs
- functionality and load speed
- security and vulnerability checks

### UML design

https://habr.com/ru/post/511798/
https://www.jetbrains.com/help/phpstorm/class-diagram.html#analyze_class

Most projects are in maintenance, so docs become outdated. Generating UML diagrams from existing code is useful. It is
also necessary when the initial documentation is incomplete or did not cover all system parts. This is especially
useful when a new developer joins.

## What is MVC and what are its benefits?

MVC is a pattern that splits app logic into three parts:

- Model: gets data from controller, performs operations, passes data to view.
- View: gets data from model and renders it to the user.
- Controller: handles user actions, validates data, passes to model.

The pattern evolved. For example, HMVC and MVVM appeared.

HMVC (Hierarchical Model-View-Controller) is an extension of MVC. Each MVC triad is a layer in a hierarchy. Each triad
is independent and can call another controller. This helps with scalability, development speed, and code reuse.

MVVM (Model-View-ViewModel) was introduced in 2005 by John Gossman as a modification of Presentation Model. It separates
model and view so they can change independently. For example, a developer handles data logic while a designer works on
UI.

## Should there be logic in the controller, and why?

A controller is a glue layer. It should be thin but not thinner than necessary.

Controllers handle input validation, HTTP response building, and similar tasks. Business logic should be moved into
services. A service is usually a stateless class with one method that contains business logic. The controller calls the
service and transforms its result for the user.

In small apps, services may be unnecessary.

Regarding the model: it can be simple and mixed with the environment via Active Record, or more complex with service
wrappers that connect it to the outside world, repositories, and incoming data.

The controller should handle input from external sources, permissions, and reactions to events (logging, email, etc).
Reactions can be direct actions or queueing tasks for a worker.

The complexity of the model and its wrapper defines how thin the controller is. The simpler the model, the thicker the
controller.

In small apps, controllers often contain business logic to save time. This sacrifices unit tests but functional tests
still work, which contradicts the controller's purpose.

In medium apps, teams move business logic into services. The service layer is a model composed of many classes. The
controller calls one or two services and passes data to the view. This often becomes hidden business logic visible only
in large projects.

In large projects, the number of services grows significantly, and the controller can become a huge action that itself
acts as a service, just to reduce time spent searching for code.

## SPL Classes

The Standard PHP Library (SPL) is a set of interfaces and classes for standard tasks.

SPL provides standard data structures, iterators, interfaces, exceptions, classes for file handling, and functions like
`spl_autoload_register()`.

SPL data structures include:

- Doubly linked lists
  - SplDoublyLinkedList
    - SplStack
    - SplQueue
- Heaps
  - SplHeap
    - SplMaxHeap
    - SplMinHeap
  - SplPriorityQueue
- Arrays
  - SplFixedArray
- Map
  - SplObjectStorage

## What Data Structures Do You Know?

SplDoublyLinkedList - doubly linked list (DLL)

A doubly linked list stores a reference to the previous and next node. Imagine standing in a queue and seeing only the
person in front and behind you. That is how elements link in a DLL. Inserting into the list is like someone cutting in
line and you forgetting who was before you (and they forget about you).

A linked list is a dynamic structure of nodes, each holding data and references to the next and/or previous node. Its
advantage over arrays is structural flexibility: element order does not match memory order, and traversal is defined by
links.

Lists can be singly, doubly, or XOR-linked.

A singly linked list has nodes that point to the next node. The last node points to NULL. You can only move forward and
cannot find the previous node from the current one.

A doubly linked list has nodes that point to both previous and next nodes. You can traverse both directions, and
removal and reordering are easier because neighbors are accessible.

In SPL, the doubly linked list is a base for two key structures: stack and queue.

The class supports both FIFO and LIFO, which allows implementing stack and queue.

Iterator, delete, add, and similar operations are O(1), which is cheap.

SPL operations on DLL include:

- count() - number of elements
- current() - current element
- isEmpty() - check if empty
- key() - current index
- next() - move to next
- prev() - move to previous
- push($value) - add to end
- rewind() - rewind iterator
- serialize() - serialize storage

SplQueue and SplStack

Both are based on SplDoublyLinkedList but with different iterator modes (LIFO and FIFO) that define order and what to do
with processed items. SplQueue uses enqueue() and dequeue(), while SplStack uses push() and pop().

SplHeap

SplHeap is a heap represented as a binary tree with up to two children per node. It is an abstract class requiring
compare() for realtime sorting when inserting nodes.

SplMaxHeap and SplMinHeap

Concrete implementations of SplHeap: SplMaxHeap sorts in descending order, SplMinHeap sorts in ascending order.

SplPriorityQueue

Similar to SplHeap but sorted by a priority property assigned to each node.

SplFixedArray

A fixed-length array with integer indices only. It is faster than normal arrays because it avoids key hashing.

SplObjectStorage

An object storage that maps objects to data or acts as a container for objects. It allows objects as keys in an
associative array.

## Stack vs Queue

A queue, like a stack, is a linear data structure with elements stored in order.

A common stack analogy is a stack of plates. You always take from the top. Clean plates are put on top, so the last
added is taken first.

A queue also prevents access to arbitrary elements, but unlike a stack, you add (enqueue) and remove (dequeue) from
opposite ends. This is FIFO (First-In-First-Out). You remove in the same order you added, like a real queue or
conveyor.

The key difference is LIFO for stacks vs FIFO for queues.

## Are you familiar with ORM and ActiveRecord?

ORM (Object-Relational Mapping) is a general name for frameworks that automatically map databases to code. They try to
hide the database as much as possible, letting developers operate through a high-level interface instead of writing SQL.

```php
$user = new App\Models\User();
$user->name = 'Petr';
$user->save(); // save to DB
```

ORMs vary. Eloquent is a common and simple ORM that implements the Active Record pattern. Each table maps to one model
class. The class handles both business logic and DB access, usually by inheriting from a base ORM class.

Another pattern is Data Mapper, implemented in Doctrine. It separates entities and DB code into two layers. This is more
flexible but more complex.

Data Mapper is a mediator between persistent storage (often relational DB) and in-memory data (domain layer). The goal
is to keep the in-memory model and storage independent of each other and of the mapper. A mapper layer can be generic or
specific to particular entities.

The key point vs Active Record is that the model follows the Single Responsibility Principle.

The Single Responsibility Principle says each object has one responsibility, fully encapsulated in its class.

A key part of any ORM is a query builder: an abstraction over SQL that makes query building easier. It is usually a
chain of methods, each representing a SQL part like ORDER, SELECT, or WHERE.

```php
$users = App\Models\User::where('state', 'active')
    ->orderBy('name', 'desc')
    ->take(10)
    ->get();
```

ORMs also handle schema changes: create, drop, and modify tables. This is usually done with a DSL, not raw SQL, so you
can ignore DB differences. The ORM generates DB-specific SQL:

```php
Capsule::schema()->create('users', function ($table) {
    $table->bigIncrements('id');
    $table->string('email')->unique();
    $table->string('first_name');
    $table->string('password');
    $table->string('last_name');
    $table->timestamps();
});
```

Eloquent uses a Database First approach: update the DB, and the ORM picks up changes automatically. For example, add a
column and the model now has that property.

Some ORMs use Code First: change code, then the ORM updates the DB schema accordingly.

PHP ORM examples:

Doctrine: ORM for PHP 7.1+, MIT license. It is built on DBAL. It uses DQL (Doctrine Query Language), inspired by HQL.
Doctrine is used in Laravel, Yii, and Symfony. Doctrine 1.* follows Active Record. Example:

```php
$user = new User();
$user->name = "john";
$user->password = "doe";
$user->save();
echo "The user with id {$user->id} has been saved.";
```

Doctrine 2.* follows Data Mapper. Example:

```php
$user = new User();
$user->setName("john");
$user->setPassword("doe");
$entityManager->persist($user);
$entityManager->flush();
echo "The user with id {$user->getId()} has been saved.";
```

Eloquent is an ActiveRecord ORM for PHP ^7.2, MIT, from Laravel, also available standalone. It maps each DB table to a
model class used for queries, inserts, and updates.

## What is PDO and prepared statements?

Most DBs support prepared statements. Think of them as compiled SQL templates executed multiple times with different
parameters. They have two main advantages:

- You prepare once and execute many times. The DB parses, compiles, and optimizes the plan once. For complex queries
  this saves a lot of time and resources.
- Parameters are escaped automatically. If your app uses prepared statements everywhere, SQL injection is very hard.
  However, if other query parts are built unsafely, SQL injection is still possible.

PDO can emulate prepared statements if the driver does not support them. This lets you use one access method across
DBMSes.

If a query includes variables, it should always use prepared statements. Placeholders can be positional (`?`) or named
(`:name`). Examples:

```php
$sql = 'SELECT name FROM users WHERE email = ?';
$sql = 'SELECT name FROM users WHERE email = :email';
```

To execute, prepare first, then execute with parameters:

```php
$stmt = $pdo->prepare('SELECT name FROM users WHERE email = ?');
$stmt->execute(array($email));

$stmt = $pdo->prepare('SELECT name FROM users WHERE email = :email');
$stmt->execute(array('email' => $email));
```

For named placeholders, keys must match placeholder names.

IMPORTANT: prepared statements are the main reason to use PDO, because they are the only safe way to execute SQL with
variables.

## Three OOP principles

### Object-oriented paradigm

Definition: OOP is a programming paradigm where the core concept is the object, which represents a domain concept.

A system is represented as a set of domain objects that interact. Each object has identity, state, and behavior.

State is all fields and their values. Behavior is all methods. Identity is what makes one object different from another
(e.g. equals in Java).

### OOP principles

- Encapsulation
- Inheritance
- Polymorphism

Encapsulation

Encapsulation means a class or system part is a black box. Users see only the interface (public methods and
properties), not internal details.

If class A accesses class B fields directly, class A depends on B's internals. Changing B requires changing A. The logic
of working with B's state lives in A, making B hard to reuse. This can make reuse only possible for the whole system.

Encapsulation is often underestimated. It reduces coupling and makes independent development easier.

Inheritance

Inheritance allows creating a class from another class, keeping properties and methods of the parent and adding new
ones.

Inheritance is often overused. It is a strong coupling. Use it carefully and keep hierarchies shallow.

Polymorphism

Polymorphism allows using derived classes in contexts intended for the base class. It helps decompose tasks and replace
if/switch with polymorphism.

With interfaces, you know an object has a method with a certain signature. You can rely on that behavior. This ability
to depend on abstractions, not concrete classes, is polymorphism.

## OOP in PHP

PHP has a simplified OOP implementation. For pure OOP study, look at Java, C++, or Object Pascal. In PHP, developers
imitate these languages, which can add complexity because PHP does not fully support some OOP concepts.

PHP was not created as OOP. It started as a functional scripting language for quick HTML inserts. OOP was added in PHP 5
(2004), and became more usable in 5.3 (2009).

PHP has two limits: no two functions with the same name, and dynamic typing (PHP 7/8 move toward strict typing).

Functions cannot be overloaded, so ad-hoc polymorphism is absent. The same applies to methods.

In PHP, polymorphism is mostly overriding: a child overrides a parent method.

You often hear "one interface - many implementations" (Bjarne Stroustrup). That is about true polymorphism, which PHP
lacks. It often leads to mindless code where a class is split into an abstract class and an interface, creating complex
inheritance without real value.

## Visibility

Visibility of properties, methods, or constants (since PHP 7.1) can be defined with public, protected, or private.

Public is accessible everywhere. Protected is accessible in the class and its descendants. Private is accessible only
within the defining class.

Properties and methods without a visibility keyword are public. Class constants can also be public/protected/private.

Objects of the same type (same class) can access each other's private/protected members, because visibility is defined
by class, not instance.

### Variable scope

Scope is the context where a variable is defined. Variables inside functions are local by default.

### Static variables

A static variable exists in function scope but keeps its value between calls. Static variables allow recursion patterns.

A static variable can be initialized with expressions but not function calls.

Since PHP 8.1, when a method with static variables is inherited (not overridden), the static variables are shared
between parent and child methods, like static properties.

```php
class Foo {
    public static function counter() {
        static $counter = 0;
        $counter++;
        return $counter;
    }
}
class Bar extends Foo {}
var_dump(Foo::counter()); // int(1)
var_dump(Foo::counter()); // int(2)
var_dump(Bar::counter()); // int(3), before 8.1.0 int(1)
var_dump(Bar::counter()); // int(4), before 8.1.0 int(2)
```

PHP uses `static` and `global` as references. A global variable imported into a function via `global` is a reference to
the global variable, which can cause unexpected behavior.

## Interface vs abstract class

Abstract classes are created with `abstract`. They can have properties and methods. But abstract methods have no body
and must be implemented in child classes.

An interface is like an abstract class without properties. It is declared with `interface`.

A class can inherit only one class but implement many interfaces.

### Interfaces

An interface describes what a class should implement. It defines public methods and constants.

Interfaces should:

- Define public methods
- Define class constants

Interfaces should not:

- Be used alone
- Define private or protected methods
- Define properties

Interfaces define method signatures only.

Interface constants are rarely used because they cannot be overridden in child interfaces or implementing classes.

### Method signature compatibility

A signature includes:

- Visibility
- Method name
- Argument list with types, names, defaults, or `...`
- Return type

Examples:

```
function ();
public function foo($arg = null);
protected function sum(int $x, int $y, ...$args): int;
```

### Interface inheritance

Interfaces can inherit from each other:

```php
interface First
{
    public const PI = 3.14159;
    public function foo(int $x);
}

interface Second extends First
{
    public const E = 2.71828;
    public function bar(string $s);
}
```

The child interface inherits methods and constants. It can override a method if the signature is identical or
compatible.

```php
interface First
{
    public function foo(int $x);
}

interface Second extends First
{
    // Allowed but pointless
    public function foo(int $x);

    // Not allowed: incompatible
    public function foo(int $x, int $y);

    // Allowed: added optional arg
    public function foo(int $x, int $y = 0);

    // Allowed: variadic
    public function foo(int $x, ...$args);

    // Allowed: compatible return type
    public function foo(int $x, ...$args): int;
}
```

### Abstract classes

Abstract classes are similar to interfaces. They are not meant to be instantiated and can contain abstract methods.

An abstract class can:

- Define abstract method signatures
- Define methods
- Define constants
- Define instance properties
- Be extended by child classes

An abstract class cannot be used directly.

### How to choose

If you create blueprints that can be used for different house types, you need an interface. If you built a house and
want variations, you need an abstract class.

Abstract classes group families of classes. For example, an abstract Car class might have Ford and Toyota subclasses
with shared methods. But a Bicycle should not inherit Car if methods like ChangeOil do not make sense. For such cases,
interfaces are better.

## Multiple constructors in a class

Overriding is when a method signature in a child matches the parent. Overloading is when one class has methods with the
same name but different parameters.

In PHP, "overloading" means dynamic properties and methods handled by magic methods.

Overloading methods are called when accessing properties or methods that are not declared or not visible.

PHP overloading differs from classic OOP overloading. Traditional overloading is multiple methods with the same name
but different parameters.

Property overloading:

- `__set()` runs when writing to inaccessible or nonexistent properties.
- `__get()` runs when reading inaccessible or nonexistent properties.
- `__isset()` runs on `isset()` or `empty()` for inaccessible or nonexistent properties.
- `__unset()` runs on `unset()` for inaccessible or nonexistent properties.

Note:

- Return values of `__set()` are ignored. `__get()` is not called for chained assignments like `$a = $obj->b = 8;`.
- PHP does not call an overloaded method from within the same overloaded method. For example, `return $this->foo` inside
  `__get()` will return null and raise E_WARNING if foo is undefined, instead of calling `__get()` again. Overloaded
  methods can trigger other overloaded methods (e.g. `__set()` calls `__get()`).

Method overloading:

- `__call()` runs when calling inaccessible methods in object context.
- `__callStatic()` runs when calling inaccessible methods in static context.

Constructors

PHP supports constructors. When a class defines a constructor, it is called on object creation, useful for
initialization.

Since PHP 8.0, constructor parameters can define properties (constructor property promotion), reducing boilerplate.

```php
class Point {
    public function __construct(protected int $x, protected int $y = 0) {
    }
}
```

Constructors in PHP cannot be overloaded.

### Static factory methods

PHP supports only one constructor, but you may want different creation paths based on input. Use static methods as
wrappers around the constructor.

You can make the constructor private or protected to prevent direct calls. Then instances can be created only via
static methods. Those methods have access to private methods across instances. A private constructor is optional.

```php
class Product {
    private ?int $id;
    private ?string $name;

    private function __construct(?int $id = null, ?string $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromBasicData(int $id, string $name): static {
        $new = new static($id, $name);
        return $new;
    }
}

$p1 = Product::fromBasicData(5, 'Widget');
```

`fromBasicData()` takes parameters, creates an instance via the constructor, and returns it.

## Traits - why

PHP supports a code reuse mechanism called traits.

A trait is a mechanism for code reuse in languages with single inheritance like PHP. It reduces limitations of single
inheritance by allowing developers to reuse method sets in multiple independent classes. The semantics are designed to
reduce complexity and avoid issues with multiple inheritance and mixins.

A trait is similar to a class, but it cannot be instantiated on its own. It enables horizontal composition of behavior
without inheritance.

```php
trait ezcReflectionReturnInfo {
    function getReturnType() { /*1*/ }
    function getReturnDescription() { /*2*/ }
}

class ezcReflectionMethod extends ReflectionMethod {
    use ezcReflectionReturnInfo;
    /* ... */
}

class ezcReflectionFunction extends ReflectionFunction {
    use ezcReflectionReturnInfo;
    /* ... */
}
```

Priority

A trait method overrides a base class method. Priority order: current class overrides trait, trait overrides inherited
method.

Multiple traits

A class can use multiple traits by listing them in `use` separated by commas.

Conflict resolution

If two traits define the same method, it is a fatal error unless resolved.

Use `insteadof` to choose one of conflicting methods. Use `as` to alias a method. `as` does not rename the original
method.

Changing method visibility

Using `as`, you can change method visibility in the consuming class.

```php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// Change visibility of sayHello
class MyClass1 {
    use HelloWorld { sayHello as protected; }
}

// Create an alias with changed visibility
// sayHello itself stays public
class MyClass2 {
    use HelloWorld { sayHello as private myPrivateHello; }
}
```

Traits composed of traits

Traits can be used in classes and other traits. A trait can be composed of one or more traits.

Abstract members in traits

Traits can define abstract methods to set requirements for the consuming class. Public, protected, and private
abstract methods are supported (before PHP 8.0 only public and protected).

Warning: The consuming class fulfills requirements by defining a method with the same name; the signature may differ.

```php
trait Hello {
    public function sayHelloWorld() {
        echo 'Hello'.$this->getWorld();
    }
    abstract public function getWorld();
}

class MyHelloWorld {
    private $world;
    use Hello;
    public function getWorld() {
        return $this->world;
    }
    public function setWorld($val) {
        $this->world = $val;
    }
}
```

Properties

Traits can define properties.

```php
trait PropertiesTrait {
    public $x = 1;
}

class PropertiesExample {
    use PropertiesTrait;
}

$example = new PropertiesExample;
$example->x;
```

Static members

Traits can define static variables, methods, and properties.

Note: Since PHP 8.1, calling static methods or properties directly on a trait is deprecated. Access them via the class
using the trait.

Constants

Since PHP 8.2, traits can define constants.

If a trait defines a constant, a class cannot define a constant with the same name unless they are compatible (same
visibility, initial value, and final modifier), otherwise a fatal error occurs.

```php
trait ConstantsTrait {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUTABLE = 5;
}

class ConstantsExample {
    use ConstantsTrait;
}

$example = new ConstantsExample;
echo $example::FLAG_MUTABLE; // 1
```

## Can you do multiple inheritance in PHP?

PHP supports inheriting from only one class. Multiple inheritance is not supported.

If you need multiple inheritance, use interfaces. You cannot inherit properties this way, but if you need that, you
should probably avoid properties and use methods.

Traits are another alternative.

If asked about multiple inheritance in PHP, you can say "yes" in the sense that interfaces can inherit from multiple
interfaces:

```php
interface First
{
    public function foo(int $x);
}

interface Second
{
    public function bar(string $s);
}

interface Third extends First, Second
{
    public function baz(array $a);
}
```

Rules for signature conflicts in multiple inheritance:

- signatures must match exactly, or
- the signature of the interface listed first must be compatible with the second (order matters, but it is rare)

## Static properties and methods

The `static` keyword has three meanings in PHP.

### 1) Static local variable

Local variables exist only during a function call. When the function ends, the variable is destroyed. On the next call,
it is created again.

```php
function foo() {
    $a = 0;
    echo $a;
    $a = $a + 1;
}

foo(); // 0
foo(); // 0
foo(); // 0
```

If you add `static` before the assignment:

```php
function foo() {
    static $a = 0;
    echo $a;
    $a = $a + 1;
}

foo(); // 0
foo(); // 1
foo(); // 2
```

Effects:

1) Assignment happens only on the first call.
2) The value is preserved after the function ends.
3) Subsequent calls reuse the stored value.

Caveats:

1) A static variable can only be assigned constants or constant expressions.
2) Methods exist in one instance. Example:

```php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A;
$a2 = new A;

$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4
```

Even with many objects, the method exists once. Each call just passes a different `$this`.

### 2) Static properties and methods on classes

PHP allows defining properties and methods on the class itself. Use `static`.

Access them with the scope resolution operator `::`, like `ClassName::$var` or `ClassName::method()`.

Static methods do not have `$this` because they belong to the class, not an instance.

Note: You can call a static method on an object if it does not use `$this`:

```php
class A {
    static public function foo() {
        echo 42;
    }
}

$a = new A;
$a->foo();
```

This is allowed in PHP. But accessing a static property via `->` is a fatal error.

### 3) Late Static Binding (LSB)

LSB is best explained with an example:

```php
class Model {
    public static $table = 'table';

    public static function getTable() {
        return self::$table;
    }
}

class User extends Model {
    public static $table = 'users';
}

echo User::getTable(); // 'table'
```

`self` refers to the class where the code is written (Model), so `self::$table` is Model::$table. This is early static
binding: resolution happens at parse/compile time.

To bind at runtime, use `static` instead of `self`:

```php
class Model {
    public static $table = 'table';

    public static function getTable() {
        return static::$table;
    }
}

class User extends Model {
    public static $table = 'users';
}

echo User::getTable(); // 'users'
```

This is late static binding. PHP also provides `get_called_class()` to get the calling class name.

## Asynchrony, concurrency, parallelism, multithreading in PHP

In short, asynchronous execution means a block of code (a "task") runs not in a fixed order, but in an order determined
by external conditions such as events or time.

A simple example is JavaScript's setTimeout:

```js
setTimeout(function () { alert('I will run in 5 seconds'); }, 5000);
alert('I will run immediately');
```

## Event loop

PHP does not implement an event loop by default. This is not because PHP is bad and JS is good; PHP lives in a different
paradigm.

Simplified PHP flow: "request" -> "web server" -> "PHP process" -> "web server" -> "response". In this model, PHP
wants to finish quickly so the client gets a response. There is no place for an event loop.

But when you write long-running CLI or GUI apps in PHP, delayed execution becomes necessary. Even "if client pressed A"
becomes asynchronous.

## Event-driven in Symfony - is it async?

Short answer: no.

Framework event systems (Symfony, Laravel, punBB) can give the illusion of async, but they are not. Event-driven
programming in request/response PHP is a pattern for complex synchronous flow, not async execution. It does not add an
actual event loop.

This does not apply to distributed asynchrony, described below.

Event-driven programming is a paradigm where program flow is determined by events: user actions, messages from other
programs, OS events (such as a network packet).

Typically, the main loop has two parts: fetch an event and handle it.

Long event handlers are problematic because the program cannot respond to other events. This is why state-machine
programming is often used.

State-machine programming treats a program or part of it as a formal automaton. You model complex behavior as
state-driven objects.

### Where this applies

This architecture works well in large systems with heavy business logic that can be decomposed into sequential or
parallel steps. It fits cases where you do not need synchronous client interaction. That is most systems.

It does not require rewriting from scratch; it can be introduced into existing microservices or monoliths.

### Tools

This section cannot cover all tools deeply, but here are common ones for event-driven architecture in PHP.

Event channels

To pass data between components/services, use:

- RabbitMQ: popular queue broker with complex routing.
- Kafka: event streaming platform that handles huge volumes and can replay events from a point in time.
- Redis: in-memory key-value DB with rich structures; you can build queues or extend with Lua.
- SQS: if you use cloud infrastructure, SQS or similar is simple and managed by the provider.

Event handlers

The common solution is daemons: background programs that continuously read from a queue and process messages.

PHP was built to die after each request. For long-running workers, you must manage daemons properly: stop at safe points
and restart automatically if they crash.

## Distributed asynchrony

If you split code into two or more independent services connected by an event bus or queue, you get real asynchrony.
The bus can be RabbitMQ or Redis Pub/Sub.

Flow:

- An HTTP service receives a request.
- If business logic needs a deferred action (e.g. send email), it writes an event to a queue and continues.
- A worker service in CLI loops, receives the event, handles the task, and waits for the next.

This is asynchronous execution, at the cost of more services. In Laravel, this is called Queued Events.

## Cooperative multitasking with generators and coroutines

Assume we have an event loop and can run tasks later. What if tasks are heavy? For example, reading a large file,
processing it, and writing to a DB. Async execution alone does not help.

We need to split large tasks into quanta and run them in small steps, alternating between tasks. Example: read one line,
transform it, write it, then read the next line. This is cooperative multitasking (concurrency). Tasks run sequentially
but give the illusion of parallelism and save resources by processing one line at a time instead of loading the whole
file.

PHP provides tools for this: generators and coroutines.

## yield

A generator is like a function, but instead of returning one value, it yields many. Any function containing `yield` is a
generator.

Calling a generator returns an object you can iterate. Each iteration asks for the next value; the generator preserves
its state between calls.

When values end, the generator finishes and the main code continues like a normal foreach over an array.

In the simplest case, `yield` is like `return`, but it pauses the function instead of ending it. The next call resumes
from the pause.

The benefit is not just memory savings, but cleaner code that can be consumed via foreach.

A foreach over a generator is a clean wrapper for a loop. The generator lets you turn the loop inside out and access
values from outside.

This makes generators useful when your data source varies (array, file, DB). Without generators, you would either load
into memory or duplicate code. Generators allow one foreach-based implementation.

Generators are also good for infinite iterators (even numbers, etc). They implement lazy evaluation.

Example 1: Simple generator

```php
function gen_one_to_three() {
    for ($i = 1; $i <= 3; $i++) {
        // $i keeps its value between calls.
        yield $i;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $value) {
    echo "$value\n";
}
```

Output:

```
1
2
3
```

Example 2: Parse large CSV line by line

```php
function getRows($file) {
    $handle = fopen($file, 'rb');
    if ($handle === false) {
        throw new Exception();
    }
    while (feof($handle) === false) {
        yield fgetcsv($handle);
    }
    fclose($handle);
}

foreach (getRows('data.csv') as $row) {
    print_r($row);
}
```

Example 3: Line-by-line file reading with generators

```php
$task1 = function () {
    $fh = fopen(__DIR__ . '/test.txt', 'r');
    while (!feof($fh)) {
        yield trim(fgets($fh));
    }
};

foreach ($task1() as $str) {
    echo $str . PHP_EOL;
}
```

## Coroutines

Generators can also receive values. `yield` can be used as an expression.

Example: "Receive a string, uppercase it, yield it, wait for next string":

```php
$task2 = function () {
    while (true) {
        $value = yield; // receive value
        yield mb_strtoupper($value); // yield transformed value
    }
};
```

A generator that can receive values is a coroutine.

Full code using both tasks:

```php
$gen1 = $task1();
$gen2 = $task2();

while (true) {
    if (!$gen1->valid()) {
        break;
    }
    $str = $gen1->current();
    echo 'Read: ' . $str . PHP_EOL;
    $str = $gen2->send($str);
    echo 'Processed: ' . $str . PHP_EOL;

    $gen1->next();
    $gen2->next();
}
```

This is cooperative multitasking: a task does a quantum of work, pauses, and hands control to another task.

There is no real parallelism. If task 1 takes 1 second per quantum and task 2 also takes 1 second, and there are 100
quanta, total time is 200 seconds. We save memory and can interrupt tasks, but still have 2*100.

Generators allow working with infinite tasks, which would be impossible otherwise.

## Fibers

Fibers are a newer feature added in PHP 8.1. Generators and coroutines were added in PHP 5.4.

Fibers allow pausing any function, not just generators, at any level (including nested calls), and resuming later.

Example rewritten with fibers:

```php
$task1 = new Fiber(function () {
    Fiber::suspend();
    $fh = fopen(__DIR__ . '/test.txt', 'r');
    while (!feof($fh)) {
        Fiber::suspend(trim(fgets($fh)));
    }
});

$task2 = new Fiber(function () {
    $value = Fiber::suspend();
    while (true) {
        $value = Fiber::suspend(mb_strtoupper($value));
    }
});

$task1->start();
$task2->start();

while (true) {
    // Get next line from first fiber
    $str = $task1->resume();

    // If finished, stop
    if ($task1->isTerminated()) {
        break;
    }

    echo 'Read: ' . $str . PHP_EOL;

    // Pass line to second fiber
    $str = $task2->resume($str);
    echo 'Processed: ' . $str . PHP_EOL;
}
```

The tricky part is `Fiber::suspend()`: it returns a value from the fiber, pauses execution until resume(), and returns
an external value for the next quantum.

Note the first line in each fiber is `Fiber::suspend()` to pause immediately after start.

Fibers allow wrapping any function, pausing at any depth with call stack preserved. They provide a clean OOP API.

Fibers are not revolutionary: like generators, they provide concurrency, maybe with a nicer interface.

The 2*100 = 200 rule still applies. The blocking code problem remains: if one task keeps the ball, others wait.

## The blocking code problem

We have tasks and quanta. The ball they pass is the execution thread. There is still only one. If a task holds the ball,
all others are blocked.

What blocks the thread? Mostly I/O: file reads/writes, DB queries. We cannot stop mid `fgets()` or `PDO::query()`. They
are synchronous and blocking. The execution thread waits.

Blocking I/O is a fundamental problem independent of OS, language, or framework.

What is the solution? Run async tasks in parallel to the main thread. One way is distributed asynchrony with queues.
Another is to add more balls.

## Real parallelism - processes

To see real parallelism, consider two tasks: one counts 1..25 with a 1 second pause, the other counts 25..1. Each takes
25 seconds. Sequential or concurrent execution takes 50 seconds. Parallel takes 25.

Tasks:

```php
$tasks = [
    1 => function () {
        foreach (range(1, 25, +1) as $value) {
            sleep(1);
            echo $value . PHP_EOL;
        }
    },

    2 => function () {
        foreach (range(25, 1, -1) as $value) {
            sleep(1);
            echo $value . PHP_EOL;
        }
    },
];
```

Use pcntl:

```php
foreach ($tasks as $task) {
    $pid = pcntl_fork();
    if (0 == $pid) {
        $task();
    }
}

pcntl_wait($status);
```

Explanation:

- `pcntl_fork()` starts a child process for each task.
- It returns the child PID in the parent, and 0 in the child.
- Run the task in the child process.
- `pcntl_wait()` makes the parent wait for children.

This runs in 25 seconds. True parallelism.

Downsides:

- Process creation is expensive, even with fork.
- Context switching costs CPU. 4 processes on 4 cores is fine. 4000 processes means heavy switching.
- Child processes do not inherit open file/network descriptors; you must reopen them.
- Inter-process communication is hard. Signals are limited, so you often need a shared data bus (e.g. key-value store).

Still, true parallelism can be worth it.

## Multithreading

Modern OSes also support threads. PHP can use them if supported by the OS.

Threads run in parallel inside one process. They share code and context: same classes, functions, and globals.

Think of a process as cooking a dish, and threads as multiple cooks working on the same recipe.

Historically, PHP threads required ZTS builds and the pthreads extension. Now there is a newer extension called
`parallel`, easier to install (still requires pthreads in the OS). It provides a clean API for running tasks in threads
and communicating between them.

Rewrite the example with parallel:

```php
$futures = [];
foreach ($tasks as $num => $task) {
    $runtime = new parallel\Runtime();
    $futures[$num] = $runtime->run($task);
}
```

`parallel\Runtime::run()` runs a task in a separate thread. It returns a Future object with status and result.

The process continues until all threads finish, so no explicit wait is needed.

Run the code and see that 25 + 25 = 25. True parallelism inside one process.

Threads also solve blocking I/O. Run blocking tasks in a separate thread while the main thread does other work, then
poll and fetch results.

## Swoole and its go-routines

Swoole is a popular async framework for PHP.

```php
Co\run(function()
{
    go(function()
    {
        Co::sleep(1);
        echo "Done 1\n";
    });

    go(function()
    {
        Co::sleep(1);
        echo "Done 2\n";
    });
});
```

This creates one execution context and runs two parallel tasks inside it.

Swoole is not magic. It uses coroutines, fibers (if available), and parallel processes. It is attractive because of its
code quality, docs, and feature set. It is worth learning if you care about async and parallel PHP.
