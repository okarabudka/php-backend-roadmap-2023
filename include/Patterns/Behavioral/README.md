## Behavioral Patterns

Behavioral patterns are divided into two types:

1. Class-level patterns
2. Object-level patterns

Class-level patterns describe interactions between classes and their subclasses. These relationships are expressed
through inheritance and class implementation. The base class defines the interface, and subclasses provide
implementations.

Object-level patterns describe interactions between objects. These relationships are expressed via associations,
aggregation, and composition. Structures are built by composing objects of certain classes.

Association is a relationship where objects of two classes can reference each other. For example, a class property
contains an instance of another class.

Aggregation is a special form of association. It is used when one object acts as a container for other objects and the
lifetime of those objects does not depend on the lifetime of the container. If the container is destroyed, the contained
objects remain. For example, you create an object and then pass it into a container object (via a method or directly
assigning a property). Deleting the container does not affect the created object, which can still interact with other
containers.

Composition is similar to aggregation, but composed objects cannot exist independently of the container object. If the
container is destroyed, all its contents are destroyed as well. For example, you create an object inside a container
method and assign it to a container property. No external code knows about that object, so when the container is
removed, the object is removed too because there are no external references.

The only class-level behavioral pattern is Template Method.

Behavioral patterns describe how objects and classes interact and aim to minimize coupling between components, making
systems more flexible.

* [Chain Of Responsibility](ChainOfResponsibility)
* [Command](Command)
* [Iterator](Iterator)
* [Mediator](Mediator)
* [Memento](Memento)
* [Observer](Observer)
* [State](State)
* [Strategy](Strategy)
* [Template Method](TemplateMethod)
* [Visitor](Visitor)
