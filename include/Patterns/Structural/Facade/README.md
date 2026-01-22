## Facade

The Facade pattern is a structural object-level pattern.

Facade provides a high-level unified interface (a set of method names) to a group of related classes or objects in a
subsystem, making it easier to use.

Splitting a complex system into subsystems simplifies development and reduces coupling. However, such subsystems become
harder to use directly. Facade solves this by providing a simple, unified interface to interact with subsystems.

Facade is designed to separate the client from the subsystem by introducing one or more interfaces and reducing
overall complexity.

- Facade does not forbid direct access to the subsystem. It just makes access easier and clearer.
- You can (and should) have multiple facades for one subsystem.

That is why a good facade does not create objects inside itself with `new`. If a facade creates objects for each method,
it is not a Facade, it is a Builder or an Abstract/Static/Simple Factory (or Factory Method).

The best facade has no `new` and no constructor with type-hinted parameters. If you need to create new class instances,
use a Factory as an argument instead.

## Example

A car interface is a good example. Modern cars provide a unified interface for the driver, hiding a complex subsystem.
Thanks to advanced electronics that do most of the work, the driver can operate the car without thinking about how it
works inside.

Required for implementation:

1. Facade class providing unified access to subsystem classes.
2. Subsystem class SubSystemA.
3. Subsystem class SubSystemB.
4. Subsystem class SubSystemC.

Note that the facade is not the only access point to the subsystem. It does not restrict advanced users who want to
work with the subsystem directly.

## Applicability

### When you need to provide a simple or limited interface to a complex subsystem.

    Subsystems tend to grow as the program evolves. Most patterns lead to more classes, though smaller ones. Such a
    subsystem is easier to reuse by configuring it for specific needs, but it becomes harder to use without
    configuration. Facade offers a default view of the system that suits most clients.

### When you want to break a subsystem into layers.

    Use facades to define entry points for each subsystem level. If subsystems depend on each other, you can simplify
    the dependency by allowing subsystems to exchange information only through facades.

    For example, take a complex video conversion system. You want to split it into audio and video layers. You can
    create a facade for each part and make audio and video processing classes communicate through those facades instead
    of directly.

## Implementation steps

1. Determine whether you can create a simpler interface than the one provided by the complex subsystem. You are on the
   right track if this interface frees the client from knowing subsystem details.

2. Create a facade class implementing that interface. It should route client calls to the appropriate subsystem objects
   and take care of correct initialization.

3. You get the most value if the client works only with the facade. Then subsystem changes affect only the facade code
   while client code stays intact.

4. If facade responsibility starts to blur, consider adding additional facades.

## Pros and cons

    + Isolates clients from components of a complex subsystem.

    - The facade can become a god object tied to all program classes.

## Relations with other patterns

1. Facade defines a new interface, while Adapter reuses an old one. Adapter wraps a single class, while Facade wraps a
   whole subsystem. Adapter can also make two existing interfaces work together instead of defining a new one.

2. Abstract Factory can be used instead of Facade to hide platform-dependent classes.

3. Flyweight shows how to create many small objects, while Facade shows how to create one object that represents a
   whole subsystem.

4. Mediator and Facade are similar because they organize work of many existing classes.
   - Facade creates a simplified interface to a subsystem without adding functionality. The subsystem does not know
     about the Facade. Subsystem classes communicate directly.
   - Mediator centralizes communication between system components. Components know only about the Mediator and have no
     direct access to each other.

5. Facade can be made a Singleton because usually only one facade is needed.

6. Facade is similar to Proxy in that it can replace a complex subsystem and initialize it. But unlike Facade, Proxy has
   the same interface as its service object, so they are interchangeable.
