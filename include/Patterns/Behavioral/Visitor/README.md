## Visitor

The Visitor pattern is a behavioral pattern at the object level.

Visitor lets you traverse a set of elements (objects) with different interfaces and also add a new method to a class
without changing the class itself.

The Visitor pattern performs operations on objects of other classes. The main goal is to keep the separation of
responsibilities between classes. Classes must define a special contract to allow Visitors to use them (the Role::accept
method in the example).

The contract is usually an abstract class, but you can use a pure interface. In that case, each visitor must decide
which method references the visitor.

## Example

Required for implementation:

1. Abstract Visitor class that defines the visitor interface.
2. ConcreteVisitor class that implements a specific visitor and methods to traverse concrete elements.
3. ObjectStructure class that implements the structure (collection) that stores elements to traverse.
4. Abstract Element class that defines the element interface.
5. ElementA class that implements an element.
6. ElementB class that implements an element.

## Applicability

### When you need to perform some operation on all elements of a complex object structure, for example, a tree.

Visitor allows you to apply the same operation to objects of different classes.

### When you need to perform some unrelated operations on objects of a complex structure, but you do not want to clutter their classes with those operations.

Visitor lets you extract related operations from the classes that make up the object structure into a single visitor
class. If the object structure is shared by multiple applications, the pattern lets each app include only the
operations it needs.

### When new behavior makes sense only for some classes in an existing hierarchy.

Visitor lets you define behavior only for those classes and leave it empty for the rest.

## Implementation steps

1. Create the visitor interface and declare visit methods for each element class that exists in the program.

2. Describe the element interface. If you work with existing classes, declare an abstract accept method in the base
   class of the element hierarchy.

3. Implement accept in all concrete elements. Each accept should redirect the call to the visitor method whose
   parameter type matches the current element class.

4. The element hierarchy should know only about the base visitor interface. Visitors, on the other hand, will know
   about all element classes.

5. For each new behavior, create a concrete visitor class. Adapt this behavior to work with all element types by
   implementing all visitor interface methods.

You may encounter a situation where a visitor needs access to private element fields. In that case you can either
expose those fields, breaking encapsulation, or make the visitor class nested inside the element class if your language
supports nested classes.

6. The client creates visitor objects and passes them to elements via accept.

## Pros and cons

    + Simplifies adding operations that work with complex object structures.
    + Combines related operations in one class.
    + Visitor can accumulate state while traversing an element structure.

    - The pattern is not justified if the element hierarchy changes often.
    - Can lead to breaking element encapsulation.

## Relations with other patterns

1. `Visitor` can be seen as an advanced analog of `Command` that can work with multiple kinds of receivers.

2. You can perform an action over a Composite tree with `Visitor`.

3. `Visitor` can be used together with `Iterator`. `Iterator` traverses the data structure, while `Visitor` performs
   actions on each component.
