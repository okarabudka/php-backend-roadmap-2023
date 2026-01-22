## Builder

The Builder pattern is a creational object-level pattern.

Builder defines a step-by-step process for constructing a complex product. After the last part is built, the product
can be used.

## Example

In the Abstract Factory example there were two factories, Coca-Cola and Pepsi. Take one factory that produces a complex
product consisting of four parts (cap, bottle, label, drink) that must be assembled in the correct order. You cannot
first take a cap and bottle, screw the cap on, and then try to pour the drink inside. To create the Coca-Cola bottle
object delivered to a client, we need Builder.

A complex object is not necessarily an object that operates on several other objects in OOP terms. For example, we need
a document consisting of a title, introduction, content, and conclusion. The document is a complex object. To enforce a
consistent order of building the document, we use Builder.

Required for implementation:

1. Director class that controls the builder and issues commands in the correct order.
2. Base abstract Builder class describing the builder interface and required commands.
3. ConcreteBuilder class implementing the builder interface and interacting with the complex object.
4. Product class representing the complex object.

## Real-world example

    One of the best uses of Builder is a SQL query builder. The Builder interface defines common steps required to build
    a SQL query. Concrete Builders for different SQL dialects implement these steps and return query parts compatible
    with their DB engine.

## Pros and cons

    + Builds products step by step.
    + Reuses the same code to create different products.
    + Isolates complex construction code from business logic.

    - Adds complexity due to additional classes.
    - The client becomes tied to specific builder classes if the director interface has no method to return the result.

## Relations with other patterns

1. Many architectures start with Factory Method (simple and extensible via subclasses) and evolve toward Abstract
   Factory, Prototype, or Builder (more flexible but more complex).
2. Builder focuses on constructing complex objects step by step. Abstract Factory specializes in creating families of
   related products. Builder returns a product only after all steps, while Abstract Factory returns a product
   immediately.
3. Builder can be used to build a Composite tree step by step.
4. Builder can be implemented as Bridge: the director plays the abstraction role, and builders are implementations.
5. Abstract Factory, Builder, and Prototype can be implemented with Singleton.
