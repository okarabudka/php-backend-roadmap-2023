## Abstract Factory

The Abstract Factory pattern is a creational pattern at the object level.

Abstract Factory provides a common interface for creating families of related objects. This separates system
functionality from internal implementation of each class, and access to those classes becomes possible via abstract
interfaces.

In general, for each family of objects a concrete factory is created (a subclass of the abstract factory), which
produces the products of that family.

### Example

There are two soda factories: Coca-Cola and Pepsi. These factories produce a family of products (objects): bottle, cap,
label, liquid. Each factory produces products that work together and cannot exist separately. A Coca-Cola factory
cannot supply customers with empty bottles.

To implement simple creation of a family of objects, there must be a factory interface, and the factory should produce
products with a specific interface. For example, bottles of both companies have one interface: they have a neck for
filling and you can check bottle volume. Bottles may differ in shape, volume, or material, which does not matter to us.
We only need to know where to pour the liquid and how much to pour.

Required for implementation:

1. AbstractFactory class describing the common factory interface that each concrete factory will extend.
2. AbstractProduct class describing the common product interface that each concrete product will extend.
3. Concrete factory class Factory.
4. Concrete product class ProductA.
5. Concrete product class ProductB.

## Real-world example

    In this example, Abstract Factory provides infrastructure for creating several variations of templates for the same
    web page elements.

    For a web application to support multiple rendering engines, its classes should work with templates only through
    interfaces, without binding to concrete classes. To achieve this, application objects should not create templates
    directly, but delegate creation to dedicated factory objects, which are also used through an abstract interface.

    Thanks to this, you can pass the app a factory corresponding to one rendering engine, knowing that from that
    moment all templates will be produced by that factory and match its rendering engine. If you want to switch the
    rendering engine, all you need is to pass a factory of another type, and nothing will break.

### Applicability

- When business logic must work with different kinds of related products without depending on their concrete classes.
- Abstract Factory hides from client code the details of how and which concrete objects are created. Client code can
  work with all product types because their common interface is defined upfront.
- When the program already uses Factory Method, but upcoming changes introduce new product types.
- In a good program each class is responsible for only one thing. If a class has too many factory methods, they blur
  its main purpose. It makes sense to move product creation logic into a separate class hierarchy using Abstract
  Factory.

### Implementation steps

    1. Create a table mapping product types to family variations.
    2. Reduce all product variations to common interfaces.
    3. Define the abstract factory interface. It should have factory methods for creating each product type.
    4. Create concrete factory classes that implement the abstract factory interface. There should be one per family
       variation.
    5. Change program initialization so it creates a specific factory and passes it into client code.
    6. Replace constructor-based product creation in client code with calls to the corresponding factory methods.

### Pros and cons

    + Guarantees compatibility between created products.
    + Removes client code coupling to concrete product classes.
    + Centralizes product creation code, easing maintenance.
    + Simplifies adding new products to the program.
    + Follows the open/closed principle.

    - Increases code complexity due to many additional classes.
    - Requires all product types to exist in each family variation.

Relations with other patterns

- Many architectures start with Factory Method (simpler and extensible through subclasses) and evolve toward Abstract
  Factory, Prototype, or Builder (more flexible but more complex).

- Builder focuses on constructing complex objects step by step. Abstract Factory specializes in creating families of
  related products. Builder returns the product only after all steps, while Abstract Factory returns a product
  immediately.

- Abstract Factory classes are often implemented using Factory Method, although they can also be based on Prototype.

- Abstract Factory can be used instead of Facade to hide platform-dependent classes.

- Abstract Factory can work together with Bridge. This is especially useful when you have abstractions that can work
  only with some implementations. The factory then defines the types of abstractions and implementations created.

- Abstract Factory, Builder, and Prototype can be implemented using Singleton.
