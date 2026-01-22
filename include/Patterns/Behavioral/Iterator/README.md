## Iterator

The Iterator pattern is a behavioral pattern at the object level.

Iterator provides a mechanism to traverse object collections without exposing their internal representation.

Often this pattern is used instead of a raw array to not only provide access to elements but also embed some logic.

## Note

PHP's standard library SPL defines the Iterator interface, which fits these needs. You may also want to implement
Countable to allow count($object) on your iterable object.

## Example

Iterator is a common interface that lets you implement arbitrary iteration logic. Typically iterators have these
methods:

Method Current() returns the current collection element.
Method Next() moves the pointer to the next element and returns it.
Method HasNext() checks availability of the next element.

Required for implementation:

1. Iterator interface describing the set of methods for accessing the collection.
2. ConcreteIterator class that implements Iterator. It tracks the position of the current element while iterating the
   collection (Aggregate).
3. Aggregate interface describing collection methods.
4. ConcreteAggregate class that implements Aggregate and stores collection elements.

## Applicability

### When you have a complex data structure and want to hide implementation details from the client (due to complexity or security concerns).

    Iterator provides the client with a few simple methods to traverse collection elements. This not only simplifies
    access to the collection but also protects its data from careless or malicious actions.

### When you need multiple traversal variants for the same data structure.

    Nontrivial traversal algorithms can have a lot of code. That code will clutter the collection class or business
    logic. Using iterator, you can move traversal code into its own class, simplifying maintenance of the rest.

### When you want a unified traversal interface for different data structures.

    Iterator lets you move different traversal implementations into subclasses. This allows you to swap iterators
    depending on which data structure you are working with.

## Implementation steps

1. Create a common iterator interface. The minimum is the operation to get the next element. For convenience you can
   add methods for previous element, current position, end-of-iteration checks, and so on.

2. Create a collection interface and define a method to get an iterator. The method signature should return the common
   iterator interface, not a specific iterator class.

3. Create concrete iterator classes for collections that need traversal via the pattern. An iterator should be bound
   to a single collection object, usually via the constructor.

4. Implement iterator creation in concrete collection classes. They should create a new iterator class that can work
   with the given collection type. The collection should pass a reference to itself into the iterator constructor.

5. Client code and collection classes should not contain traversal code. The client should get a new iterator from the
   collection each time it needs to traverse elements.

## Pros and cons

    + Simplifies data storage classes.
    + Lets you implement different traversal methods.
    + Allows moving through a data structure in different directions at the same time.

    - Not justified if a simple loop is enough.

## Relations with other patterns

1. You can traverse a Composite tree using `Iterator`.

2. `Factory Method` can be used together with `Iterator` so collection subclasses can create appropriate iterators.

3. `Memento` can be used with `Iterator` to save the current traversal state and return to it later if needed.

4. `Visitor` can be used with `Iterator`. The `Iterator` traverses the data structure, while `Visitor` performs actions
   on each component.
