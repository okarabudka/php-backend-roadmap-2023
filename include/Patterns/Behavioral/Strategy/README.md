## Strategy

The Strategy pattern is a behavioral pattern at the object level.

Strategy defines a family of algorithms, encapsulates each one in a separate class, and makes them interchangeable.
Strategy lets you swap algorithms without involving the clients that use them.

## Examples

    - sorting a list of objects, one strategy sorts by date, another by id

    - simplifying unit testing: for example, switching between file storage and in-memory storage

## Example

Required for implementation:

1. Context class that represents the execution context of a strategy.
2. Abstract Strategy class that defines the interface for different strategies.
3. ConcreteStrategyA class that implements one of the strategies, which is an algorithm aimed at a specific goal.
4. ConcreteStrategyB class that implements one of the strategies, which is an algorithm aimed at a specific goal.

## Applicability

### When you need to use different variations of an algorithm inside a single object.

    Strategy lets you vary object behavior at runtime by plugging in different behavior objects (for example, with
    different speed vs resource tradeoffs).

### When you have many similar classes that differ only in some behavior.

    Strategy lets you move the differing behavior into a separate class hierarchy, and then reduce the original classes
    to one by making its behavior configurable.

### When you do not want to expose algorithm implementation details to other classes.

    Strategy isolates code, data, and dependencies of algorithms from other objects by hiding those details inside
    strategy classes.

### When different algorithm variations are implemented as a large conditional statement. Each branch represents a variation.

    Strategy puts each branch into a separate strategy class. The context gets a strategy object from the client and
    delegates work to it. If you need to change the algorithm, supply a different strategy to the context.

## Implementation steps

1. Identify the algorithm that changes often or has several variations selected at runtime.

2. Create a strategy interface that describes the algorithm. It must be common for all algorithm variants.

3. Put algorithm variants into their own classes that implement the interface.

4. In the context class, add a field to store the current strategy and a method to change it. Ensure the context uses
   the strategy only through the common interface.

5. Context clients must supply the appropriate strategy object when they want the context to behave in a specific way.

## Pros and cons

    + Hot swapping of algorithms at runtime.
    + Isolates algorithm code and data from other classes.
    + Moves from inheritance to delegation.
    + Follows the open/closed principle.

    - Makes the program more complex due to extra classes.
    - The client must know the differences between strategies to choose the right one.

## Relations with other patterns

1. `Bridge`, `Strategy`, and `State` (and slightly `Adapter`) have similar class structures: all are based on
   composition, i.e., delegating work to other objects. They differ in the problems they solve. Patterns are not just
   recipes for building code but descriptions of the problems that led to the solution.

2. `Command` and `Strategy` are similar in spirit but differ in scale and use:
   Command is used to turn any diverse actions into objects. Operation parameters become fields on the object. That
   object can then be logged, stored in history for undo, passed to external services, and so on.
   Strategy, on the other hand, describes different ways to perform the same action, allowing them to be swapped in a
   context object.

3. `Strategy` changes behavior from the inside, while `Decorator` changes it from the outside.

4. `Template Method` uses inheritance to extend parts of an algorithm. `Strategy` uses delegation to change algorithms
   at runtime. `Template Method` works at the class level. `Strategy` lets you change logic of individual objects.

5. `State` can be seen as an extension of `Strategy`. Both patterns use composition to change behavior of the main
   object by delegating work to helper objects. In `Strategy` these objects do not know about each other. In `State` the
   concrete states can switch the context.
