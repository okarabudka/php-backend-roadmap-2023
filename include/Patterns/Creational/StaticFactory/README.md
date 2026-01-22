## Static Factory

Like Abstract Factory, this pattern is used to create a set of related or dependent objects. The difference from
Abstract Factory is that Static Factory uses only one static method to create all allowed object types. This method is
usually named factory or build.

![](uml20.webp)

## Code

### StaticFactory.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Creational\StaticFactory;


    use InvalidArgumentException;


    /**

     * Note1: Remember, static means global state which is evil because it can't be mocked for tests

     * Note2: Cannot be subclassed or mock-upped or have multiple different instances.

     */

    final class StaticFactory

    {

        public static function factory(string $type): Formatter

        {

            return match ($type) {

                'number' => new FormatNumber(),

                'string' => new FormatString(),

                default => throw new InvalidArgumentException('Unknown format given'),

            };

        }

    }

### Formatter.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Creational\StaticFactory;


    interface Formatter

    {

        public function format(string $input): string;

    }

### FormatString.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Creational\StaticFactory;


    class FormatString implements Formatter

    {

        public function format(string $input): string

        {

            return $input;

        }

    }

### FormatNumber.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Creational\StaticFactory;


    class FormatNumber implements Formatter

    {

        public function format(string $input): string

        {

            return number_format((int) $input);

        }

    }

### StaticFactoryTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Creational\StaticFactory\Tests;


    use InvalidArgumentException;

    use DesignPatterns\Creational\StaticFactory\FormatNumber;

    use DesignPatterns\Creational\StaticFactory\FormatString;

    use DesignPatterns\Creational\StaticFactory\StaticFactory;

    use PHPUnit\Framework\TestCase;


    class StaticFactoryTest extends TestCase

    {

        public function testCanCreateNumberFormatter()

        {

            $this->assertInstanceOf(FormatNumber::class, StaticFactory::factory('number'));

        }


        public function testCanCreateStringFormatter()

        {

            $this->assertInstanceOf(FormatString::class, StaticFactory::factory('string'));

        }


        public function testException()

        {

            $this->expectException(InvalidArgumentException::class);


            StaticFactory::factory('object');

        }

    }
