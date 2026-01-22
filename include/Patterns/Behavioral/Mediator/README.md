## Mediator

The Mediator pattern is a behavioral pattern at the object level.

Mediator provides a mediator object that hides how a set of colleague objects interact. Mediator makes the system
loosely coupled by removing direct references between objects, which allows you to change their interactions
independently.

## Example

For example, there is a mediator between a bakery plant, a farmer, and a retail store. The mediator frees the farmer
from interacting with the plant that uses the raw materials, and frees the plant from interacting with the store that
sells the products.

Required for implementation:

1. Mediator interface that describes how information is exchanged between Colleague objects.
2. ConcreteMediator class that implements Mediator.
3. Base abstract Colleague class that describes how colleague objects interact with Mediator.
4. ConcreteColleague class that implements Colleague. Each colleague knows only the mediator object. All colleagues
   exchange information only through the mediator.

## Applicability

### When it is hard to change classes because they have many chaotic links to other classes.

    Mediator puts all these links into one class, making it easier to refactor, understand, and evolve them.

### When you cannot reuse a class because it depends on too many other classes.

    After applying the pattern, components lose their direct links to other components, and all communication happens
    indirectly through the mediator object.

### When you have to create many component subclasses to use the same components in different contexts.

    If a change in one component used to cause a cascade of changes in others, now you can create a mediator subclass
    and change the relationships there.

## Implementation steps

1. Find a group of tightly coupled classes; decoupling them would bring some benefit, for example, reusing their code in
   another program.

Create a common mediator interface and define methods for interaction with components. In the simplest case, a single
method for receiving notifications from components is enough.

2. This interface is required if you want to reuse component classes for other tasks. In that case, all you need is a
   new concrete mediator class.

3. Implement the interface in a concrete mediator class. Add fields that hold references to all component objects.

4. You can go further and move component creation into the mediator class, turning it into something like a factory or
   a facade.

5. Components should also have a reference to the mediator object. The easiest way to set this up is to pass the
   mediator via the component constructor.

6. Change component code so they call the mediator's notification method instead of methods of other components. On the
   other side, the mediator should call the needed component methods when it receives a notification.

## Pros and cons

    + Eliminates dependencies between components, enabling reuse.
    + Simplifies interactions between components.
    + Centralizes control in one place.

    - The mediator can become bloated.

## Relations with other patterns

1. `Chain of Responsibility`, `Command`, `Mediator`, and `Observer` show different ways of working with request senders
   and receivers:
   Chain of Responsibility passes a request through a chain of potential receivers until one handles it.
   Command sets up an indirect one-way connection from senders to receivers.
   Mediator removes direct connections between senders and receivers, making them communicate through itself.
   Observer broadcasts a request to all interested receivers while allowing them to subscribe or unsubscribe.

2. `Mediator` and `Facade` are similar in that they try to organize work of many existing classes.
   Facade creates a simplified interface to a subsystem without adding functionality. The subsystem does not know about
   the Facade. Subsystem classes talk to each other directly.
   Mediator centralizes communication between system components. Components know only about Mediator and have no direct
   access to each other.

3. The difference between `Mediator` and `Observer` is not always obvious. They often compete, but sometimes work
   together.

The goal of Mediator is to remove mutual dependencies between system components. Instead, they become dependent on the
mediator itself. The goal of Observer is to provide a dynamic one-way connection where some objects indirectly depend on
others.

A popular implementation of Mediator uses Observer. The mediator acts as a publisher, and other components become
subscribers and can dynamically listen to mediator events. In that case it can be hard to tell the patterns apart.

But Mediator has other implementations where components are tightly bound to the mediator object. That code is unlikely
to resemble Observer, but it is still Mediator.

    Conversely, if we implement Mediator with Observer in a program where each component becomes a publisher, components
    can subscribe to each other without binding to concrete classes. The program becomes a network of Observers without
    a central Mediator object.
