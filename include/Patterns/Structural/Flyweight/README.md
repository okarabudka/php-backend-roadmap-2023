## Flyweight

The Flyweight pattern is a structural object-level pattern.

Flyweight is used to efficiently support a large number of small objects. It allows reusing small objects in different
contexts.

## Example

Required for implementation:

1. FlyweightFactory class, a modified factory pattern for creating flyweights.
2. Base abstract Flyweight class to describe the common flyweight interface.
3. ConcreteFlyweight class implementing a flyweight that replaces identical small objects.

The idea is that you can request flyweights from the factory, and it will return objects that already exist or create
new ones. This means you reuse existing objects instead of creating more when the needed ones already exist.
