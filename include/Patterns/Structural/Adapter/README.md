## Adapter

The Adapter pattern is a structural class-level pattern.

In new projects, developers often want to reuse existing code. Existing classes may provide the needed functionality
but have incompatible interfaces. In such cases, use the Adapter pattern.

The idea is that if you have a class whose interface is incompatible with your system, you do not change that class.
Instead, you write an adapter for it. Adapter adapts existing code to the required interface (acts as a connector).

## Example

Required for implementation:

1. ITarget interface describing the target interface (the one our system wants to work with).
2. Adaptee class that our system must adapt.
3. Adapter class that implements the target interface.

## Applicability

### When you want to use a third-party class, but its interface does not match the rest of the app.

    Adapter lets you create a wrapper object that converts app calls into a format the third-party class understands.

### When you need to use several existing subclasses, but they lack some shared functionality and you cannot extend the superclass.

    You could create another level of subclasses and add missing functionality there, but you would duplicate the same
    code in both branches.

    A more elegant solution is to place the missing functionality into an adapter and make it work with the superclass.
    Such an adapter can work with all subclasses in the hierarchy. This looks very similar to Decorator.

## Implementation steps

1. Make sure you have two classes with incompatible interfaces:
   a useful service - a class you cannot modify (third-party or depended on by other code),
   and one or more clients that are incompatible with the service due to an inconvenient interface.

2. Describe a client interface through which the app classes could use the service class.

3. Create an adapter class implementing this interface.

4. Add a field in the adapter to hold a reference to the service object. Usually this field is set via the adapter
   constructor. For simple adaptation, you can pass the service object via adapter method parameters.

5. Implement all methods of the client interface in the adapter. The adapter should delegate the main work to the
   service.

6. The application should use the adapter only through the client interface. This makes adapters easy to change or add
   later.

## Pros and cons

    + Separates and hides interface conversion details from the client.

    - Adds complexity due to additional classes.

## Relations with other patterns

1. Bridge is designed in advance to develop large parts of an app independently. Adapter is applied after the fact to
   make incompatible classes work together.

2. Adapter changes the interface of an existing object. Decorator enhances another object without changing its
   interface. Decorator supports recursive nesting, Adapter does not.

3. Adapter provides an alternative interface for a class. Decorator provides an extended interface. Proxy provides the
   same interface.

4. Facade defines a new interface, while Adapter reuses an old one. Adapter wraps a single class, while Facade wraps a
   whole subsystem. Adapter can also make two existing interfaces work together instead of creating a new one.

5. Bridge, Strategy, and State (and to some extent Adapter) have similar class structures - they are all built on
   composition, delegating work to other objects. They differ in the problems they solve. Patterns are not only code
   recipes but also descriptions of the problems that led to these solutions.
