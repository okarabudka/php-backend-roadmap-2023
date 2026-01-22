## Entity-Attribute-Value (Attribute)

The Entity-Attribute-Value pattern is used to implement the EAV model in PHP.

## Intent

The Entity-Attribute-Value (EAV) data model is intended to describe entities where the number of attributes
(properties, parameters) is potentially huge, but the number that will actually be used for a given entity is
relatively small.

## Code

### Entity.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\EAV;


    use SplObjectStorage;


    class Entity implements \Stringable

    {

        /**

        * @var SplObjectStorage<Value,Value>

        */

        private $values;


        /**

        * @param Value[] $values

        */

        public function __construct(private string $name, array $values)

        {

            $this->values = new SplObjectStorage();


            foreach ($values as $value) {

                $this->values->attach($value);

            }

        }


        public function __toString(): string

        {

            $text = [$this->name];


            foreach ($this->values as $value) {

                $text[] = (string) $value;

            }


            return join(', ', $text);

        }

    }

### Attribute.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\EAV;


    use SplObjectStorage;


    class Attribute implements \Stringable

    {

        private SplObjectStorage $values;


        public function __construct(private string $name)

        {

            $this->values = new SplObjectStorage();

        }


        public function addValue(Value $value): void

        {

            $this->values->attach($value);

        }


        public function getValues(): SplObjectStorage

        {

            return $this->values;

        }


        public function __toString(): string

        {

            return $this->name;

        }

    }

### Value.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\EAV;


    class Value implements \Stringable

    {

        public function __construct(private Attribute $attribute, private string $name)

        {

            $attribute->addValue($this);

        }


        public function __toString(): string

        {

            return sprintf('%s: %s', (string) $this->attribute, $this->name);

        }

    }

## Test

### Tests/EAVTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\More\EAV\Tests;


    use DesignPatterns\More\EAV\Attribute;

    use DesignPatterns\More\EAV\Entity;

    use DesignPatterns\More\EAV\Value;

    use PHPUnit\Framework\TestCase;


    class EAVTest extends TestCase

    {

        public function testCanAddAttributeToEntity(): void

        {

            $colorAttribute = new Attribute('color');

            $colorSilver = new Value($colorAttribute, 'silver');

            $colorBlack = new Value($colorAttribute, 'black');


            $memoryAttribute = new Attribute('memory');

            $memory8Gb = new Value($memoryAttribute, '8GB');


            $entity = new Entity('MacBook Pro', [$colorSilver, $colorBlack, $memory8Gb]);


            $this->assertEquals('MacBook Pro, color: silver, color: black, memory: 8GB', (string) $entity);

        }

    }
