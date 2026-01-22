## Prototype

The Prototype pattern is a creational object-level pattern.

Prototype allows creating new objects by copying (cloning) a previously created original object (prototype).

It helps avoid the cost of creating objects in the standard way (new Foo()), by creating a prototype and cloning it.

The pattern describes creating clone objects based on a prototype object. In other words, Prototype describes how to
organize the cloning process.

## Example

Required for implementation:

1. Base Prototype class declaring a cloning interface. All inheriting classes must implement cloning.
2. ConcretePrototypeA class implementing that prototype.
3. ConcretePrototypeB class implementing that prototype.

Typically cloning happens via a getClone() method defined in the base class and implemented by each product. But in PHP
there is also the clone keyword and the __clone magic method for implementing cloning.

## Applicability

### When your code should not depend on classes of copied objects.

    This often happens if your code works with objects passed from the outside via a common interface. You cannot tie
    yourself to their classes because you do not know them.

    Prototype provides a common interface for all prototypes. The client depends only on the cloning interface, not on
    all concrete classes.

### When you have many subclasses that differ only by initial field values, created to easily produce objects with a specific configuration.

    Prototype suggests using a set of prototypes instead of creating subclasses for popular configurations.

    Instead of instantiating subclasses, you copy existing prototype objects that already have internal state set up.
    This avoids an explosion in class count and reduces complexity.

## Pros and cons

    + Clones objects without depending on their concrete classes.
    + Less repetitive initialization code.
    + Speeds up object creation.
    + An alternative to subclassing for building complex objects.

    - Hard to clone composite objects that reference other objects.

## Relations with other patterns

1. Many architectures start with Factory Method (simple and extensible via subclasses) and evolve toward Abstract
   Factory, Prototype, or Builder (more flexible but more complex).
2. Abstract Factory classes are often implemented with Factory Method, but they can also be built on Prototype.
3. If a Command must be copied before adding to command history, Prototype can help.
4. Architecture built on Composite and Decorator can often be improved with Prototype. It allows cloning complex object
   structures instead of rebuilding them.
5. Prototype does not rely on inheritance, but it needs a complex initialization. Factory Method, on the contrary,
   relies on inheritance and does not require complex initialization.
6. Memento can sometimes be replaced by Prototype if the object whose state must be stored is simple, has no active
   external resource references, or they can be restored easily.
7. Abstract Factory, Builder, and Prototype can be implemented with Singleton.
