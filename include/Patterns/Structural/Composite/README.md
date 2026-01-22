## Composite

The Composite pattern is a structural object-level pattern.

Composite groups similar objects into tree structures.

## Example

Arrays representing tree branches are used to build the tree.

Required for implementation:

1. Base abstract class Component that provides a common interface for both branches and leaves.
2. Composite class implementing Component and representing a tree branch.
3. Leaf class implementing Component and representing a tree leaf.

Note that a leaf is a terminal node and cannot have children (a branch or another leaf cannot grow from a leaf).

Tree branches define the behavior of objects that are part of the tree structure and have children, and they also store
child components. In other words, branches can contain other branches and leaves.

The main goal of the pattern is to provide a single interface for both composite (branch) and leaf objects, so the
client does not need to care which type it works with.

## Applicability

### When you need to represent a tree structure of objects.

    Composite suggests storing references to other simple or composite objects inside composite objects. Those, in turn,
    can store their own nested objects, and so on. This lets you build complex tree data structures using just two main
    object types.

### When clients should treat simple and composite objects uniformly.

    Since both simple and composite objects implement the same interface, it does not matter to the client which type it
    works with.

## Implementation steps

1. Make sure your business logic can be represented as a tree structure. Try to split it into simple components and
   containers. Remember that containers can hold both simple components and other nested containers.

2. Create a common component interface that unifies operations of containers and simple components. The interface is
   good if you can use it to swap simple and composite components without losing meaning.

3. Create leaf components that have no further branches. Note that a program may contain several such classes.

4. Create container components and add a collection for storing references to child components. This collection must be
   able to store both simple and composite components, so it should be typed as the component interface.

5. Implement the component interface methods in the container, remembering that containers should delegate most of the
   work to child components.

6. Add operations for adding and removing child components to the container class.

7. Note that add/remove operations can also be placed in the component interface. Yes, this breaks interface
   segregation because the leaf implementations will be empty. But all tree components become truly uniform to the
   client.

## Pros and cons

    + Simplifies client architecture when working with complex component trees.
    + Makes it easy to add new component types.

    - Creates an overly general class design.

## Relations with other patterns

1. Builder allows you to build a Composite tree step by step.

2. Chain of Responsibility is often used together with Composite. In this case, a request is passed from child
   components to their parents.

3. You can traverse a Composite tree using Iterator.

4. You can apply an action to an entire Composite tree with Visitor.

5. Composite is often combined with Flyweight to share common tree branches and save memory.

6. Composite and Decorator have similar class structures because both rely on recursive composition. It allows linking
   an unlimited number of objects into one structure.

7. Decorator wraps a single object, while a Composite node can have many children. Decorator adds new functionality to a
   wrapped object, while Composite adds nothing new but "sums" the results of all children.

8. They can also cooperate: Composite can use Decorator to override behavior of individual parts of the component tree.

9. Architecture built on Composite and Decorator can often be improved with Prototype. It allows cloning complex object
   structures instead of rebuilding them from scratch.
