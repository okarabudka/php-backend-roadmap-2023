## Bridge

The Bridge pattern is a structural object-level pattern.

Bridge separates an object into abstraction and implementation so they can change independently.

If one abstraction can have multiple implementations, inheritance is often used. But inheritance tightly couples the
implementation to the abstraction, which makes independent changes harder and reuse more complex.

Use the pattern when you have an abstraction and several implementations. There is no point in separating abstraction
from implementation if there is only one implementation.

I did not find a solid description of the Bridge pattern. Many examples I saw were vague or unrealistic. From what I
understand: Bridge is a clever form of aggregation. A class that represents a product implements the interface of an
aggregated class that is passed in when the product instance is created.

## Example

As I understand it: we have 3 cars and 3 different engines. Each engine fits each car, so each car can work with any
engine. If you do this with inheritance, you get 9 classes. That is inconvenient, so we inject the engine when creating
a car. Also, each engine can run on different fuel types, diesel or gasoline. To avoid creating 6 engine variations, we
pass the fuel type when creating the engine.

To implement the pattern in this example, the base car class should have a field that stores a pointer to the
implementation type. The class receives it in the constructor and calls methods on the embedded object when needed.

Required for implementation:

1. Base abstract class (in our case describing a car).
2. A class implementing the base class. It has a field into which we pass the used engine (the car can work with any of
   the engines).
3. Engine abstraction.
4. Engine implementation.

In short, the field storing a pointer to the used object is the bridge. We can supply different objects there, as long
as they share the same interface.

## Applicability

### When you want to split a monolithic class that contains several different implementations of some functionality (for example, if a class can work with different database systems).

    The larger the class, the harder it is to understand, and the more it slows down development. In addition, changes
    in one implementation force you to edit the entire class, which can introduce accidental errors.

    Bridge allows you to split a monolithic class into several separate hierarchies. After that, you can change their
    code independently. This simplifies work and reduces the chance of errors.

### When a class needs to be extended in two independent dimensions.

    Bridge suggests extracting one dimension into a separate hierarchy of classes while keeping a reference to one of
    its objects in the original class.

### When you want the implementation to be changeable at runtime.

    Bridge lets you replace implementations at runtime because the implementation is not "baked into" the abstraction.

    Because of this point, Bridge is often confused with Strategy. Note that for Bridge this is less important; its main
    goal is structural.

## Implementation steps

1. Determine whether your classes have two orthogonal dimensions. Examples: functionality/platform, domain/infrastructure,
   front-end/back-end, or interface/implementation.

2. Think through which operations clients need and describe them in the base abstraction class.

3. Identify behaviors available on all platforms and extract the part needed by the abstraction. Describe a common
   implementation interface based on this.

4. For each platform, create a concrete implementation class. They must follow the common interface defined earlier.

5. Add a reference to the implementation object in the abstraction class. Implement abstraction methods by delegating
   to the implementation object.

6. If you have several variations of the abstraction, create a subclass for each.

7. The client should pass the implementation object into the abstraction constructor to link them. After that it can
   use the abstraction and forget about the implementation.

## Pros and cons

    + Allows building platform-independent programs.
    + Hides unnecessary or dangerous implementation details from client code.
    + Follows the open/closed principle.

    - Adds complexity due to additional classes.

## Relations with other patterns

1. Bridge is designed in advance to develop large parts of an app independently. Adapter is applied after the fact to
   make incompatible classes work together.

2. Bridge, Strategy, and State (and to some extent Adapter) have similar class structures - they are all built on
   composition, delegating work to other objects. They differ in the problems they solve. Patterns are not only code
   recipes but also descriptions of the problems that led to these solutions.

3. Abstract Factory can work together with Bridge. This is useful when you have abstractions that can work only with
   some implementations. In that case the factory defines which abstractions and implementations are created.

4. Builder can be built as a Bridge: the director plays the abstraction role, and builders are the implementations.
