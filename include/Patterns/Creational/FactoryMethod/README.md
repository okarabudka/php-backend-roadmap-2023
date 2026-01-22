## Factory Method

The Factory Method pattern is a creational pattern at the class level and focuses only on relationships between
classes.

Factory Method is useful when a system must remain easily extensible by adding new object types. This pattern is the
basis for all creational patterns and can be adapted to system needs. Therefore, if requirements are not clear or the
interaction between products is not yet defined, you can start with Factory Method until requirements settle.

Factory Method is used to create objects with a certain interface, with implementations provided by subclasses. In
other words, there is a base abstract factory class that says each derived factory must implement a method to create
its products.

Factory Method implementations can vary, depending on the language. It can be polymorphism or a parameterized method.

Factory Method differs from Abstract Factory in that Abstract Factory produces a family of objects that are different
and have different interfaces but interact with each other. Factory Method produces products that share one interface
and are not related or interacting.

This pattern is a "real" design pattern because it follows the Dependency Inversion Principle, also known as the "D"
in S.O.L.I.D.

## Example

We receive files with extensions .txt, .png, .doc. Depending on file extension, we should store them in one of the
folders /file/txt/, /file/png/, and /file/doc/. So we will have a file factory with a parameterized factory method that
accepts a file path to save into one of the folders. This factory method returns an object that we can use to
manipulate the file (save it, check the type and destination folder). Note that we do not specify which product class
instance we need; the factory method does this by detecting the file extension and choosing the right product class.
Thus, if the system grows and available extensions become, say, 25, we only need to update the factory method and
implement new product classes.

Required for implementation:

1. Base abstract Creator class that defines the interface a concrete factory must implement to produce products. This
   base class defines the factory method.
2. Base Product class that defines the product interface returned by the factory. All products returned by the factory
   must share one interface.
3. ConcreteCreator class that implements the factory method.
4. ConcreteProductA class.
5. ConcreteProductB class.
6. ConcreteProductC class.

## Applicability

### When the types and dependencies of objects your code should work with are not known in advance.

    Factory Method separates product creation code from the rest of the code that uses those products.

    Because of that, you can extend the creation code without touching the main code. To add a new product, you need
    to create a new subclass and define the factory method that returns an instance of the new product.

### When you want to allow users to extend parts of your framework or library.

    Users can extend framework classes via inheritance. But how can the framework create objects from those new classes
    instead of the standard ones?

    The solution is to allow users to extend not only the desired components but also the classes that create those
    components. For that, the creator classes must have concrete creation methods that can be overridden.

    For example, you use a ready UI framework for your app. But you need round buttons instead of standard rectangular
    ones. You create a `RoundButton` class. How do you tell the framework class `UIFramework` to create round buttons
    instead of the standard ones?

    You create a `UIWithRoundButtons` subclass of the framework base class, override the button creation method
    (like `createButton`), and return your button class. Then use `UIWithRoundButtons` instead of the standard
    `UIFramework`.

## Implementation steps

1. Bring all created products to a common interface.
2. In the class that produces products, create an empty factory method. Its return type should be the common product
   interface.
3. Walk through the class code and find all places where products are created. Replace those spots with calls to the
   factory method, moving product creation code into it. You may need to add parameters that control which product to
   create. At this stage the factory method will likely look ugly: it will contain a big conditional that chooses the
   product class. Do not worry, we will fix this next.
4. For each product type, create a subclass and override the factory method. Move the corresponding product creation
   code from the superclass.
5. If there are too many products for existing creator subclasses, consider parameters in the factory method that allow
   different products within one subclass.
6. If after all moves the factory method became empty, you can make it abstract. If something remains, it will be the
   default implementation.

## Pros and cons

    + Removes coupling to concrete product classes.
    + Centralizes product creation code, easing maintenance.
    + Simplifies adding new products to the program.
    + Follows the open/closed principle.

    - Can lead to large parallel class hierarchies because each product class needs its own creator subclass.

## Relations with other patterns

1. Many architectures start with `Factory Method` (simpler and extensible through subclasses) and evolve toward
   `Abstract Factory`, `Prototype`, or `Builder` (more flexible but more complex).
2. `Abstract Factory` classes are often implemented using `Factory Method`, although they can also be based on
   `Prototype`.
3. `Factory Method` can be used together with `Iterator` so collection subclasses can create appropriate iterators.
4. `Prototype` does not rely on inheritance but needs complex initialization. `Factory Method`, on the other hand, is
   built on inheritance but does not require complex initialization.
5. `Factory Method` can be seen as a special case of `Template Method`. Also, `Factory Method` is often part of a large
   class with `Template Methods`.
