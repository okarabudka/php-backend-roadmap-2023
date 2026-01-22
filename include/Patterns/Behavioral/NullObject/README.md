## Null Object

## Intent

NullObject is not a GoF pattern, but a scheme that appears often enough to be considered a pattern. It has the
following benefits:

    Client code is simplified.

    Reduces the chance of null pointer exceptions (and PHP errors of various levels).

    Fewer extra conditionals means fewer test cases.

Methods that return an object or null should return a NullObject instead. This is formalized, simplified code that
eliminates the need to check if (!is_null($obj)) { $obj->callSomething(); }, replacing it with a normal call
$obj->callSomething();.

## Examples

    Null logger or null output to preserve a standard way of interaction between objects, even if they should not do anything

    null handler in a Chain of Responsibility pattern

    null command in a Command pattern

## Code

### Service.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Behavioral\NullObject;


    class Service

    {

        public function __construct(private Logger $logger)

        {

        }


        /**

        * do something ...

        */

        public function doSomething()

        {

            // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it

            $this->logger->log('We are in ' . __METHOD__);

        }

    }

### Logger.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Behavioral\NullObject;


    /**

    * Key feature: NullLogger must inherit from this interface like any other loggers

    */

    interface Logger

    {

        public function log(string $str);

    }

### PrintLogger.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Behavioral\NullObject;


    class PrintLogger implements Logger

    {

        public function log(string $str)

        {

            echo $str;

        }

    }

### NullLogger.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Behavioral\NullObject;


    class NullLogger implements Logger

    {

        public function log(string $str)

        {

            // do nothing

        }

    }

## Test

### Tests/LoggerTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Behavioral\NullObject\Tests;


    use DesignPatterns\Behavioral\NullObject\NullLogger;

    use DesignPatterns\Behavioral\NullObject\PrintLogger;

    use DesignPatterns\Behavioral\NullObject\Service;

    use PHPUnit\Framework\TestCase;


    class LoggerTest extends TestCase

    {

        public function testNullObject()

        {

            $service = new Service(new NullLogger());

            $this->expectOutputString('');

            $service->doSomething();

        }


        public function testStandardLogger()

        {

            $service = new Service(new PrintLogger());

            $this->expectOutputString('We are in DesignPatterns\Behavioral\NullObject\Service::doSomething');

            $service->doSomething();

        }

    }
