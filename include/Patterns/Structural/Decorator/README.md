## Decorator

The Decorator pattern is a structural object-level pattern.

Decorator is used to extend object functionality by dynamically adding new capabilities. It uses composition.

The essence of a decorator is wrapping a ready object with new behavior, while keeping the original interface
available by forwarding all requests to the wrapped object.

## Example

Required for implementation:

1. Base abstract Component class that provides an interface for both the decorator and the component.
2. ConcreteDecorator class implementing Component and overriding component methods, adding behavior when needed.
3. ConcreteComponent class implementing Component that will be wrapped by decorators.

With this structure, it does not matter whether a component is a decorator or a concrete implementation, since they
share the same interface and you can build decorator chains. This allows dynamic changes to object state and behavior.

I heard a good example with Karlsson. We have Karlsson, we put a jumpsuit on him and change his state; then we attach a
propeller to the pants and change behavior. The propeller can be removed depending on the situation, reverting behavior,
or we can put on a different jumpsuit with other properties.

## Applicability

### When you need to add responsibilities to objects on the fly, without affecting the code that uses them.

    Objects are placed in wrappers with additional behavior. Wrappers and objects share the same interface, so clients do
    not care whether they work with a plain object or a wrapped one.

### When you cannot extend an object's responsibilities via inheritance.

    Many languages have a final keyword that can block class inheritance. Such classes can be extended only with a
    Decorator.

## Implementation steps

1. Make sure your task has one core component and several optional extensions or add-ons.

2. Create a component interface that describes common methods for both the core component and its extensions.

3. Create a concrete component class and place the main business logic there.

4. Create a base decorator class. It should have a field that stores a reference to a nested component object. All base
   decorator methods should delegate the work to the nested object.

5. Both the concrete component and the base decorator must follow the same component interface.

6. Now create concrete decorators by inheriting from the base decorator. A concrete decorator should perform its extra
   function and then (or before that) call the same operation on the wrapped object.

7. The client is responsible for configuring and ordering the wrappers.

## Pros and cons

    + More flexibility than inheritance.
    + Adds responsibilities on the fly.
    + Can add multiple responsibilities at once.
    + Allows having several small objects instead of one object for all cases.

    - Hard to configure multiple nested wrappers.
    - Lots of tiny classes.

## Relations with other patterns

1. Adapter changes the interface of an existing object. Decorator enhances another object without changing its
   interface. Decorator supports recursive nesting, Adapter does not.

2. Adapter provides an alternative interface. Decorator provides an extended interface. Proxy provides the same
   interface.

3. Chain of Responsibility and Decorator have very similar structures. Both are based on recursive execution through a
   series of linked objects, but they differ in key ways.

4. Handlers in Chain of Responsibility can perform arbitrary actions and stop the chain at any moment. Decorators extend
   a specific action without breaking the base interface or stopping other decorators.

5. Composite and Decorator have similar class structures because both rely on recursive composition. It allows linking
   an unlimited number of objects into one structure.

6. Decorator wraps a single object, while a Composite node can have many children. Decorator adds new functionality to
   the wrapped object, while Composite adds nothing new but sums results of all children.

7. They can also cooperate: Composite can use Decorator to override behavior of individual parts of the component tree.

8. Architecture built on Composite and Decorator can often be improved with Prototype. It allows cloning complex object
   structures instead of rebuilding them from scratch.

9. Strategy changes object behavior "from the inside", while Decorator changes it "from the outside".

10. Decorator and Proxy have similar structures but different purposes. Both are built on composition and delegate work
    to other objects. The difference is that Proxy manages the service object's lifecycle, while Decorator wrapping is
    controlled by the client.
