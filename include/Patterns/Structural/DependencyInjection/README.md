## Dependency Injection

## Intent

To implement a loosely coupled architecture, getting more testable, maintainable, and extensible code.

## Usage

The DatabaseConfiguration object is injected into DatabaseConnection and the latter gets everything it needs from the
$config variable. Without DI, the configuration would be created inside Connection, which is not good for testing and
extending Connection because it couples these classes directly.

## Examples

The Doctrine2 ORM uses Dependency Injection, for example, for configuration injected into the Connection object. For
testing, you can easily create a mock configuration object and inject it into Connection, replacing the original.

Many frameworks already have DI containers that create objects from configuration arrays and inject them where needed
(for example, into Controllers).

## Code

### DatabaseConfiguration.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DependencyInjection;


    class DatabaseConfiguration

    {

        public function __construct(

            private string $host,

            private int $port,

            private string $username,

            private string $password

        ) {

        }


        public function getHost(): string

        {

            return $this->host;

        }


        public function getPort(): int

        {

            return $this->port;

        }


        public function getUsername(): string

        {

            return $this->username;

        }


        public function getPassword(): string

        {

            return $this->password;

        }

    }

### DatabaseConnection.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DependencyInjection;


    class DatabaseConnection

    {

        public function __construct(private DatabaseConfiguration $configuration)

        {

        }


        public function getDsn(): string

        {

            // this is just for the sake of demonstration, not a real DSN

            // notice that only the injected config is used here, so there is

            // a real separation of concerns here


            return sprintf(

                '%s:%s@%s:%d',

                $this->configuration->getUsername(),

                $this->configuration->getPassword(),

                $this->configuration->getHost(),

                $this->configuration->getPort()

            );

        }

    }

## Test

### Tests/DependencyInjectionTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DependencyInjection\Tests;


    use DesignPatterns\Structural\DependencyInjection\DatabaseConfiguration;

    use DesignPatterns\Structural\DependencyInjection\DatabaseConnection;

    use PHPUnit\Framework\TestCase;


    class DependencyInjectionTest extends TestCase

    {

        public function testDependencyInjection()

        {

            $config = new DatabaseConfiguration('localhost', 3306, 'domnikl', '1234');

            $connection = new DatabaseConnection($config);


            $this->assertSame('domnikl:1234@localhost:3306', $connection->getDsn());

        }

    }
