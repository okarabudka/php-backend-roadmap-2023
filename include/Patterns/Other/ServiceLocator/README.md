## Service Locator

This pattern is considered an anti-pattern.

Some consider Service Locator an anti-pattern. It violates the Dependency Inversion Principle from SOLID. Service
Locator hides dependencies of a class instead of exposing them for injection, as in Dependency Injection. If those
dependencies change, we risk breaking classes that use them, which makes maintenance harder.

## Intent

To implement a loosely coupled architecture and get testable, maintainable, and extensible code. The Dependency
Injection (DI) and Service Locator patterns are implementations of Inversion of Control (IoC).

## Usage

With Service Locator you can register a service for a given interface. Using the interface you can obtain the
registered service and use it in application classes without knowing its implementation. You can configure and inject a
Service Locator object during application bootstrap.

## Code

### Service.php

    <?php


    namespace DesignPatterns\More\ServiceLocator;


    interface Service

    {


    }

### ServiceLocator.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\ServiceLocator;


    use OutOfRangeException;

    use InvalidArgumentException;


    class ServiceLocator

    {

        /**

        * @var string[][]

        */

        private array $services = [];


        /**

        * @var Service[]

        */

        private array $instantiated = [];


        public function addInstance(string $class, Service $service)

        {

            $this->instantiated[$class] = $service;

        }


        public function addClass(string $class, array $params)

        {

            $this->services[$class] = $params;

        }


        public function has(string $interface): bool

        {

            return isset($this->services[$interface]) || isset($this->instantiated[$interface]);

        }


        public function get(string $class): Service

        {

            if (isset($this->instantiated[$class])) {

                return $this->instantiated[$class];

            }


            $object = new $class(...$this->services[$class]);


            if (!$object instanceof Service) {

                throw new InvalidArgumentException('Could not register service: is no instance of Service');

            }


            $this->instantiated[$class] = $object;


            return $object;

        }

    }

### LogService.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\ServiceLocator;


    class LogService implements Service

    {


    }

## Test

### Tests/ServiceLocatorTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\ServiceLocator\Tests;


    use DesignPatterns\More\ServiceLocator\LogService;

    use DesignPatterns\More\ServiceLocator\ServiceLocator;

    use PHPUnit\Framework\TestCase;


    class ServiceLocatorTest extends TestCase

    {

        private ServiceLocator $serviceLocator;


        public function setUp(): void

        {

            $this->serviceLocator = new ServiceLocator();

        }


        public function testHasServices()

        {

            $this->serviceLocator->addInstance(LogService::class, new LogService());


            $this->assertTrue($this->serviceLocator->has(LogService::class));

            $this->assertFalse($this->serviceLocator->has(self::class));

        }


        public function testGetWillInstantiateLogServiceIfNoInstanceHasBeenCreatedYet()

        {

            $this->serviceLocator->addClass(LogService::class, []);

            $logger = $this->serviceLocator->get(LogService::class);


            $this->assertInstanceOf(LogService::class, $logger);

        }

    }
