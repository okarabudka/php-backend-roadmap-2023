## Template Method

The Template Method pattern is a behavioral pattern at the class level.

Template Method defines the structure of an algorithm and lets subclasses implement, override, or redefine certain
steps without changing the algorithm structure as a whole.

The designer decides which steps of the algorithm are fixed and which are variable. The abstract base class
implements standard fixed steps and may provide default implementations for variable steps. Variable steps can be
supplied by the client in concrete subclasses.

You have probably seen this many times. The idea is to let heirs of the abstract template override the behavior of the
parent algorithm.

As in the Hollywood principle: "Do not call us, we will call you." This class is not called by subclasses, but the
other way around: subclasses are called by the parent. How? Through a method in the parent abstraction.

In other words, this is an algorithm skeleton that is well suited for libraries (frameworks, for example). The user
implements the specific steps, and the superclass does the main work.

This is a simple way to isolate logic in specific classes and reduce copy-paste, so you will see it everywhere in one
form or another.

## Example

Required for implementation:

1. AbstractClass that implements the Template Method and defines the order of actions.
2. ConcreteClass that implements the variable actions.

## Applicability

### When subclasses must extend a base algorithm without changing its structure.

    Template Method lets subclasses extend certain steps of the algorithm via inheritance without changing the
    structure defined in the base class.

### When you have multiple classes doing the same thing with minor differences. If you edit one class you have to make similar changes in the others.

    Template Method suggests creating a common superclass for similar classes and expressing the main algorithm as
    steps. The differing steps can be overridden in subclasses.

    This removes duplicate code across multiple classes with similar behavior but different details.

## Implementation steps

1. Study the algorithm and think if it can be split into steps. Decide which steps are standard for all variations and
   which are variable.

2. Create an abstract base class. Define the template method in it. This method should consist of calls to algorithm
   steps. It often makes sense to make the template method final so subclasses cannot override it (if your language
   allows it).

3. Add methods to the abstract class for each algorithm step. You can make these methods abstract or provide a default
   implementation. In the first case all subclasses must implement them; in the second, only if the subclass behavior
   differs from the default.

4. Consider adding hooks to the algorithm. Most often hooks are placed between main steps and before or after all
   steps.

5. Create concrete classes that inherit from the abstract class. Implement all missing steps and hooks in them.

## Pros and cons

    + Makes code reuse easier.

    - You are tightly constrained by the existing algorithm skeleton.
    - You can break the Liskov substitution principle by changing base behavior of a step in a subclass.
    - As the number of steps grows, the template method becomes too hard to maintain.

## Relations with other patterns

1. Factory Method can be seen as a special case of Template Method. Also, Factory Method is often part of a larger
   class with Template Methods.

2. Template Method uses inheritance to extend parts of an algorithm. Strategy uses delegation to change algorithms at
   runtime. Template Method works at the class level. Strategy lets you change the logic of individual objects.
