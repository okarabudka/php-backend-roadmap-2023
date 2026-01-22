## Data Mapper

## Intent

Data Mapper is a pattern that acts as a mediator for bidirectional data transfer between a persistent data store
(often a relational database) and the in-memory data representation (the domain layer, what is loaded and used for
logic). The goal is to keep the in-memory representation and the persistent store independent of each other and of the
mapper itself. The layer consists of one or more mappers (or data access objects) responsible for data transfer. Mapper
implementations vary in purpose. Generic mappers can handle various domain entity types, while specialized mappers
handle one or a few specific types.

The key point of this pattern, as opposed to Active Record, is that the data model follows the SOLID Single
Responsibility Principle.

## Examples

    DB Object Relational Mapper (ORM): Doctrine2 uses a DAO called EntityRepository.

## Code

### User.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DataMapper;


    class User

    {

        public static function fromState(array $state): User

        {

            // validate state before accessing keys!


            return new self(

                $state['username'],

                $state['email']

            );

        }


        public function __construct(private string $username, private string $email)

        {

        }


        public function getUsername(): string

        {

            return $this->username;

        }


        public function getEmail(): string

        {

            return $this->email;

        }

    }

### UserMapper.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DataMapper;


    use InvalidArgumentException;


    class UserMapper

    {

        public function __construct(private StorageAdapter $adapter)

        {

        }


        /**

        * finds a user from storage based on ID and returns a User object located

        * in memory. Normally this kind of logic will be implemented using the Repository pattern.

        * However the important part is in mapRowToUser() below, that will create a business object from the

        * data fetched from storage

        */

        public function findById(int $id): User

        {

            $result = $this->adapter->find($id);


            if ($result === null) {

                throw new InvalidArgumentException("User #$id not found");

            }


            return $this->mapRowToUser($result);

        }


        private function mapRowToUser(array $row): User

        {

            return User::fromState($row);

        }

    }

### StorageAdapter.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DataMapper;


    class StorageAdapter

    {

        public function __construct(private array $data)

        {

        }


        /**

        * @return array|null

        */

        public function find(int $id)

        {

            if (isset($this->data[$id])) {

                return $this->data[$id];

            }


            return null;

        }

    }

## Test

### Tests/DataMapperTest.php

    <?php


    declare(strict_types=1);


    namespace DesignPatterns\Structural\DataMapper\Tests;


    use InvalidArgumentException;

    use DesignPatterns\Structural\DataMapper\StorageAdapter;

    use DesignPatterns\Structural\DataMapper\User;

    use DesignPatterns\Structural\DataMapper\UserMapper;

    use PHPUnit\Framework\TestCase;


    class DataMapperTest extends TestCase

    {

        public function testCanMapUserFromStorage()

        {

            $storage = new StorageAdapter([1 => ['username' => 'domnikl', 'email' => 'liebler.dominik@gmail.com']]);

            $mapper = new UserMapper($storage);


            $user = $mapper->findById(1);


            $this->assertInstanceOf(User::class, $user);

        }


        public function testWillNotMapInvalidData()

        {

            $this->expectException(InvalidArgumentException::class);


            $storage = new StorageAdapter([]);

            $mapper = new UserMapper($storage);


            $mapper->findById(1);

        }

    }
