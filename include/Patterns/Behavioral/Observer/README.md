## Observer

The Observer pattern is a behavioral pattern at the object level.

Observer defines a one-to-many dependency between objects so that when one object changes state, all dependent objects
are notified and updated automatically.

The main participants are Subjects (publishers) and Observers (subscribers).

There are two ways to receive notifications from a subject:

1. Pull: after receiving a notification, the observer goes to the subject and fetches the data.
2. Push: the subject sends the updated data to the observer directly.

## Real-world examples

    A message queue system observes queues to show progress in a GUI.

## Note

PHP provides two standard interfaces that can help implement this pattern: SplObserver and SplSubject.

## Example

Required for implementation:

1. Abstract Subject class that defines the publisher interface.
2. ConcreteSubject class that implements Subject.
3. Abstract Observer class that defines common subscriber behavior.
4. ConcreteObserver class that implements Observer.

## Applicability

### When you need to do something in other objects after one object changes, but you do not know in advance which objects should react.

    This problem can appear when building UI libraries where you want third-party classes to respond to button clicks.

    Observer lets any object with the observer interface subscribe to notifications about events in subject objects.

### When some objects must observe others only in certain cases.

    Subjects maintain dynamic lists. Observers can subscribe and unsubscribe during program execution.

## Implementation steps

1. Split your functionality into two parts: an independent core and optional dependent parts. The core becomes the
   subject. The dependent parts become observers.

2. Create the observer interface. Usually it is enough to define a single notification method.

3. Create the subject interface and define subscription management operations. Remember that the subject should work
   only with the common observer interface.

4. You need to decide where to put subscription management code, since it is usually the same for all kinds of
   subjects. The most obvious way is to put it into an intermediate abstract class that all subjects inherit from.

If you are integrating the pattern into existing classes, creating a new base class can be hard. In that case, you can
move subscription logic into a helper object and delegate to it from subjects.

5. Create concrete subject classes. Implement them so that after each state change they notify all their observers.

6. Implement the notification method in concrete observers. Do not forget to include parameters through which the
   subject can send data related to the event.

Another option is that the observer, after receiving a notification, fetches the needed data from the subject object.
But then you must bind the observer class to a concrete subject class.

7. The client must create the needed number of observer objects and subscribe them to subjects.

## Pros and cons

    + Subjects do not depend on concrete observer classes and vice versa.
    + You can subscribe and unsubscribe receivers on the fly.
    + Follows the open/closed principle.

    - Observers are notified in a random order.

## Relations with other patterns

1. `Chain of Responsibility`, `Command`, `Mediator`, and `Observer` show different ways of working with request senders
   and receivers:

   Chain of Responsibility passes a request through a chain of potential receivers until one handles it.
   Command sets up an indirect one-way connection from senders to receivers.
   Mediator removes direct connections between senders and receivers, making them communicate through itself.
   Observer broadcasts a request to all interested receivers while allowing them to subscribe or unsubscribe.

2. The difference between `Mediator` and `Observer` is not always obvious. They often compete, but sometimes work
   together.

   The goal of Mediator is to remove mutual dependencies between system components. Instead, they become dependent on
   the mediator itself. The goal of Observer is to provide a dynamic one-way connection where some objects indirectly
   depend on others.

   A popular implementation of Mediator uses Observer. The mediator acts as a publisher, and other components become
   subscribers and can dynamically listen to mediator events. In that case it can be hard to tell the patterns apart.

   But Mediator has other implementations where components are tightly bound to the mediator object. That code is
   unlikely to resemble Observer, but it is still Mediator.

   Conversely, if we implement Mediator with Observer in a program where each component becomes a publisher, components
   can subscribe to each other without binding to concrete classes. The program becomes a network of Observers without
   a central Mediator object.
