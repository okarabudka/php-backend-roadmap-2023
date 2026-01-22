## Singleton

The Singleton pattern is a creational object-level pattern.

It controls the creation of a single instance of a class and provides access to it.

In other words, Singleton guarantees that a class has only one instance and provides a global access point via a
factory method.

## Example

Required for implementation:

1. Singleton class implemented accordingly (see implementation).

## Real-world analogy

    A government is a good example of a singleton. A country can have only one official government. Regardless of who
    sits in the government, it has a global access point: "Government of Country N".

## Applicability

### When a program must have a single instance of a class accessible to all clients (for example, a shared DB connection).

    Singleton hides all ways of creating a new object except for a special method. That method either creates the
    object or returns an existing one if it has already been created.

### When you want more control over global variables.

    Unlike global variables, Singleton guarantees that no other code will replace the created instance, so you are
    always sure that only one singleton object exists.

    Still, you can lift this restriction at any time and allow multiple instances by changing code in one place (the
    getInstance method).

## Pros and cons

    + Guarantees a single class instance.
    + Provides a global access point.
    + Implements lazy initialization.

    - Violates the single responsibility principle.
    - Masks bad design.
    - Multithreading issues.
    - Requires constant mock creation in unit tests.

## Relations with other patterns

1. Facade can be made a Singleton because usually only one facade object is needed.
2. Flyweight can resemble Singleton if for a particular task you reduce the number of objects to one. But there are two
   key differences:

    - Unlike Singleton, you can have many flyweight objects.
    - Flyweight objects must be immutable, while a singleton object can change its state.
