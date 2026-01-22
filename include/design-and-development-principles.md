# Design and Development Principles

#### Links

- [Principles for development: KISS, DRY, YAGNI, BDUF, SOLID, APO, and Occam's Razor](https://habr.com/ru/company/itelma/blog/546372/)
- [SOLID principles in pictures](https://habr.com/ru/company/productivity_inside/blog/505430/)
- [SOLID principles with examples](https://habr.com/ru/post/688530/)
- [PHP: What are DI, Container, Auto-wiring in seven simple steps](https://habr.com/ru/post/655399/)
- [Dependency Injection in Software Engineering](https://habr.com/ru/company/avito/blog/556924/)
- [DesignPatterns PHP](https://designpatternsphp.readthedocs.io/ru/latest/README.html)
- [Design Patterns](https://refactoring.guru/ru/design-patterns/php)
- [What are anti-patterns?](https://habr.com/ru/post/59005/)
- [Domain Driven Design (DDD) - what is it and how to start using DDD](https://blog-programmista.ru/post/132-ddd-what-is-it.html)
- [What is TDD (test-driven development)](https://freehost.com.ua/faq/articles/chto-takoe-tdd-test-driven-development/)
- [CQRS and Event Sourcing patterns](https://bool.dev/blog/detail/pattern-cqrs-i-event-sourcing)

## KISS, DRY, YAGNI, BDUF, SOLID, APO, and Occam's Razor [&uarr;](#design-and-development-principles)

### YAGNI (You Aren't Gonna Need It)

This principle is simple but often ignored. If you write code, be sure you need it. Do not write code just because you
think you might need it later.

This applies to refactoring. If you are refactoring a method, class, or file, do not be afraid to delete extra methods.
Even if they used to be useful, they may not be needed anymore.

If they ever become necessary again, you can retrieve them from Git history.

### DRY (Don't Repeat Yourself)

This concept was first described in The Pragmatic Programmer by Andy Hunt and Dave Thomas.

The idea revolves around a single source of truth (SSOT).

SSOT helps create a more robust and understandable codebase.

Code duplication is a waste of time and resources. You must maintain the same logic in multiple places, and if you
change one spot, you must change the others.

Duplication often comes from not knowing the system. Before writing something, be pragmatic and look around. Maybe this
function already exists. Maybe this business logic is implemented elsewhere. Reuse is almost always the right choice.

### KISS (Keep It Simple, Stupid)

This principle was developed by the US Navy in 1960. It says that simple systems work better and are more reliable.

In software terms, do not design a more complex solution than a task requires.

Sometimes the simplest solution is the best. Writing efficient and simple code is a good goal.

A common mistake is using new tools just because they are shiny. Use new technologies because they fit the job, not
because they are new.

### BDUF (Big Design Up Front)

This approach is important but often ignored. Before implementation, make sure the design is thought through.

Many developers believe they are not progressing if they are not writing code. That is a mistake. A plan saves you from
starting over again and again.

In many cases, other people should be involved in architecture decisions. The earlier you discuss it, the better for
everyone.

A common counterargument is that fixing problems later is cheaper than planning. But the fewer mistakes users hit, the
better their experience. You may not get a second chance to fix those errors.

### SOLID

SOLID is a set of principles that lead to code that is easier to scale and maintain.

- S - Single Responsibility Principle: a class should have one responsibility.
- O - Open/Closed Principle: classes should be open for extension but closed for modification.
- L - Liskov Substitution Principle: derived types must be substitutable for base types.
- I - Interface Segregation Principle: do not force clients to implement interfaces they do not use.
- D - Dependency Inversion Principle: high-level modules should not depend on low-level modules; both depend on
  abstractions.

---

#### 1. **Single Responsibility Principle (SRP)**
**Definition**: A class should have only one reason to change. This means a class should only have one job or
responsibility.

#### Example:
```php
<?php
// Bad Example: This class has more than one responsibility (User management and email sending)
class User {
    public function createUser($name) {
        // Create user logic
    }

    public function sendEmail($email, $message) {
        // Email sending logic
    }
}
?>

// Good Example: Separate the responsibilities
<?php
class User {
    public function createUser($name) {
        // Create user logic
    }
}

class EmailService {
    public function sendEmail($email, $message) {
        // Email sending logic
    }
}
?>
```
In the good example, `User` is responsible only for creating a user, and `EmailService` is responsible for sending an
email. If the email logic changes, we only need to modify `EmailService`.

---

#### 2. **Open/Closed Principle (OCP)**
**Definition**: A class should be open for extension but closed for modification. This means you should be able to add
new functionality without changing the existing code.

#### Example:
```php
<?php
// Bad Example: This class must be modified to add a new payment method
class Payment {
    public function pay($paymentType) {
        if ($paymentType === 'CreditCard') {
            // Credit card payment logic
        } elseif ($paymentType === 'PayPal') {
            // PayPal payment logic
        }
    }
}
?>

// Good Example: Use polymorphism to extend without modifying
<?php
interface PaymentMethod {
    public function pay();
}

class CreditCardPayment implements PaymentMethod {
    public function pay() {
        // Credit card payment logic
    }
}

class PayPalPayment implements PaymentMethod {
    public function pay() {
        // PayPal payment logic
    }
}

class Payment {
    public function processPayment(PaymentMethod $paymentMethod) {
        $paymentMethod->pay();
    }
}
?>
```
In the good example, we can add new payment methods (like `BankTransferPayment`) without changing the `Payment` class,
making it extensible but not modifiable.

---

#### 3. **Liskov Substitution Principle (LSP)**
**Definition**: Subtypes should be substitutable for their base types. This means that derived classes must be usable
through the base class interface without altering the correctness of the program.

#### Example:
```php
<?php
// Bad Example: A subclass changes behavior in a way that violates the base class contract
class Bird {
    public function fly() {
        return "Flying";
    }
}

class Penguin extends Bird {
    public function fly() {
        throw new Exception("Penguins can't fly");
    }
}
?>

// Good Example: Avoid violating the base class contract
<?php
class Bird {
    public function move() {
        return "Moving";
    }
}

class Sparrow extends Bird {
    public function move() {
        return "Flying";
    }
}

class Penguin extends Bird {
    public function move() {
        return "Swimming";
    }
}
?>
```
In the good example, the `move()` method is more generic, so both `Sparrow` and `Penguin` subclasses can have different
behaviors without violating the base class's behavior.

---

#### 4. **Interface Segregation Principle (ISP)**
**Definition**: A class should not be forced to implement interfaces it does not use. This means that interfaces should
be small and specific to the client.

#### Example:
```php
<?php
// Bad Example: A large interface that forces classes to implement methods they don't need
interface Worker {
    public function work();
    public function eat();
}

class HumanWorker implements Worker {
    public function work() {
        return "Human working";
    }

    public function eat() {
        return "Human eating";
    }
}

class RobotWorker implements Worker {
    public function work() {
        return "Robot working";
    }

    public function eat() {
        // Robots don't eat, but must implement this method
    }
}
?>

// Good Example: Split the interface into smaller ones
<?php
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

class HumanWorker implements Workable, Eatable {
    public function work() {
        return "Human working";
    }

    public function eat() {
        return "Human eating";
    }
}

class RobotWorker implements Workable {
    public function work() {
        return "Robot working";
    }
}
?>
```
In the good example, the `Workable` and `Eatable` interfaces are separated, so the `RobotWorker` class is not forced to
implement methods it does not need.

---

#### 5. **Dependency Inversion Principle (DIP)**
**Definition**: High-level modules should not depend on low-level modules. Both should depend on abstractions.
Abstractions should not depend on details; details should depend on abstractions.

#### Example:
```php
<?php
// Bad Example: High-level class depends on low-level class
class LightBulb {
    public function turnOn() {
        // Turn the light bulb on
    }
}

class Switch {
    private $lightBulb;

    public function __construct(LightBulb $lightBulb) {
        $this->lightBulb = $lightBulb;
    }

    public function operate() {
        $this->lightBulb->turnOn();
    }
}
?>

// Good Example: High-level class depends on an abstraction (interface)
<?php
interface Switchable {
    public function turnOn();
}

class LightBulb implements Switchable {
    public function turnOn() {
        // Turn the light bulb on
    }
}

class Fan implements Switchable {
    public function turnOn() {
        // Turn the fan on
    }
}

class Switch {
    private $device;

    public function __construct(Switchable $device) {
        $this->device = $device;
    }

    public function operate() {
        $this->device->turnOn();
    }
}
?>
```
In the good example, the `Switch` class depends on the `Switchable` interface (abstraction) rather than the concrete
class `LightBulb`. Now `Switch` can work with any `Switchable` device, such as a `Fan`, without modification.

---

#### Summary of SOLID Principles:
1. **Single Responsibility**: A class should have one job.
2. **Open/Closed**: Extend a class's behavior without modifying it.
3. **Liskov Substitution**: Subtypes must be substitutable for their base types.
4. **Interface Segregation**: Do not force a class to implement interfaces it does not use.
5. **Dependency Inversion**: Depend on abstractions, not concrete classes.

These principles help design code that is maintainable, scalable, and flexible.

---

### Avoid Premature Optimization (APO)

This practice warns against optimizing code before the need is proven. If you follow KISS or YAGNI, you will likely
avoid this trap.

It is good to anticipate problems, but before you dive into optimization, make sure it is actually useful.

A simple example is scaling. You would not buy 40 servers just because your new app might be popular. You add servers
when you need them.

Premature optimization can delay delivery and increase time to market.

Many consider premature optimization the root of all evil.

### Occam's Razor

In programming, this means: do not create unnecessary entities. Be pragmatic and consider whether they are needed,
because they can complicate your codebase.

## Patterns and Anti-patterns [&uarr;](#design-and-development-principles)

### What are patterns?

A design pattern is a common reusable solution to a recurring problem in software design. Patterns describe
relationships and interactions between classes and help build flexible systems. Using patterns appropriately increases
reuse of proven solutions.

### What are anti-patterns?

Anti-patterns are the opposite of patterns. If patterns are examples of good practices, anti-patterns are templates for
common mistakes. Avoiding anti-patterns is part of good engineering.

Anti-patterns are a developer's main enemies. They often appear due to pressure from stakeholders, project managers, or
just lack of time, which can lead to serious problems and unstable systems later.

### Copy and Paste Programming

When a developer needs two similar functions, the easiest option is to write one and copy it with small changes. This
causes problems:

- Portability suffers. If you need similar functionality elsewhere, you must locate all copies and move them.
- Code quality drops. Developers often forget to update copied code correctly.
- Maintenance becomes harder. If the original had a bug, the bug exists in all copies and must be fixed everywhere.
- Code review becomes more difficult because there is more code with no real benefit.

### Spaghetti Code

Spaghetti code is poorly structured and hard to understand. It often includes copy-paste anti-patterns. Even the author
may not understand it later. In OOP, spaghetti code often appears as a few objects with huge methods. Causes include
"it works" thinking, weak code review, lack of OOP experience, and distributed teams. Spaghetti code should not be
reused. If you need to extend it, refactor it or rewrite that part. Spend time now to save much more later.

### Golden Hammer

This is the belief that one solution is universal. In practice, it is applying one pattern to all tasks. Many developers
use this anti-pattern unknowingly, thinking they are competent because they know one pattern. Beginners often avoid
learning new tools and solve everything with the one method they know.

### Magic Numbers

A magic number is a constant used without meaning or context. It carries no semantic information without a comment.
When non-obvious numbers appear in code, readability suffers. Over time, even the author cannot explain the logic.
Magic numbers make refactoring harder. Causes include rushing and lack of practice.

### Hard Code

Hard coding is embedding environment data in code: file paths, process names, device names, and so on. It is tightly
linked to magic numbers. Hard-coded values reduce portability. Code works on the developer's system but breaks when
files move, names change, or devices differ. Developers quickly forget what they hard-coded, making it hard to find. The
solution is to ban hard coding and enforce good code review.

### Soft Code

Soft coding is a paranoid fear of hard coding. It leads to configuring everything, making configuration complex and
opaque. It wastes time and resources. Before solving a task, decide what must be configurable and what can be fixed or
auto-detected.

### Accidental Complexity

In simple terms: overcomplication. Any solution can be made unnecessarily complex with extra checks, soft coding, or
lack of optimization. This makes code harder to understand and slower. Causes include poor refactoring or low
competence. Solve it with good code review and refactoring.

### Boat Anchor

This anti-pattern keeps unused parts of a system after optimization or refactoring. Some code remains "just in case".
It only adds weight without value.

### Reinventing the Wheel

This is creating your own solution when good solutions already exist. The developer thinks they are best and tries to
solve every task from scratch. This wastes time and often leads to suboptimal solutions. You should still know how to
solve problems yourself, but you must be aware of existing solutions and use them when appropriate.

### Reinventing the Square Wheel

This is creating a worse solution when a better one exists. It wastes time twice: first on the bad implementation, then
on refactoring and replacing it. Developers should know existing solutions and their tradeoffs.

### Lava Flow

At some point you may find code that has not changed for a long time and is undocumented, with comments like "I do not
know how it works, but it works. Do not delete." If you do nothing, it stays forever. Refactoring it is difficult,
especially if the author is gone. Prevent this by designing for future changes, not by writing irreplaceable code.
Causes include one-developer systems, no code review, and architecture mistakes.

### Programming by Permutation

Many beginners solve tasks by trial and error: tweaking parameters, changing call order, and so on. This fixes symptoms
without understanding. If you do not understand the root cause, you will miss scenarios and waste time later.

### Blind Faith

This anti-pattern is insufficient validation of input data, error handling, or results. Developers assume ideal
conditions and no bad input. But you cannot trust any code, even your own. Still, do not go to the other extreme of
paranoia and accidental complexity. Validate input and consider failures.

### Thoughtless Commenting

This leads to many useless comments. Do not comment just to comment. Comments should document important information and
help understanding for your future self and others. Do not have conversations in comments; use code review tools or
direct discussion.

### God Object

A god object takes on too many responsibilities or holds too much data. The code becomes hard to understand and
maintain, and the whole system depends on it. Causes include low competence or giving one developer too much work. The
solution is to split responsibilities into smaller units.

## Design Patterns [&uarr;](#design-and-development-principles)

### [Creational](Creational)

* [ ] [Abstract Factory](Patterns/Creational/AbstractFactory)
* [ ] [Builder](Patterns/Creational/Builder)
* [ ] [Factory Method](Patterns/Creational/FactoryMethod)
* [ ] [Object Pool](Patterns/Creational/Pool)
* [ ] [Prototype](Patterns/Creational/Prototype)
* [ ] [Simple Factory](Patterns/Creational/SimpleFactory)
* [ ] [Singleton](Patterns/Creational/Singleton)
* [ ] [Static Factory](Patterns/Creational/StaticFactory)

### [Structural](Structural)

* [ ] [Adapter](Patterns/Structural/Adapter)
* [ ] [Bridge](Patterns/Structural/Bridge)
* [ ] [Composite](Patterns/Structural/Composite)
* [ ] [Data Mapper](Patterns/Structural/DataMapper)
* [ ] [Decorator](Patterns/Structural/Decorator)
* [ ] [Dependency Injection](Patterns/Structural/DependencyInjection)
* [ ] [Facade](Patterns/Structural/Facade)
* [ ] [Fluent Interface](Patterns/Structural/FluentInterface)
* [ ] [Flyweight](Patterns/Structural/Flyweight)
* [ ] [Proxy](Patterns/Structural/Proxy)
* [ ] [Registry](Patterns/Structural/Registry)

### [Behavioral](Behavioral)

* [ ] [Chain of Responsibility](Patterns/Behavioral/ChainOfResponsibility)
* [ ] [Command](Patterns/Behavioral/Command)
* [ ] [Interpreter](Patterns/Behavioral/Interpreter)
* [ ] [Iterator](Patterns/Behavioral/Iterator)
* [ ] [Mediator](Patterns/Behavioral/Mediator)
* [ ] [Memento](Patterns/Behavioral/Memento)
* [ ] [Null Object](Patterns/Behavioral/NullObject)
* [ ] [Observer](Patterns/Behavioral/Observer)
* [ ] [Specification](Patterns/Behavioral/Specification)
* [ ] [State](Patterns/Behavioral/State)
* [ ] [Strategy](Patterns/Behavioral/Strategy)
* [ ] [Template Method](Patterns/Behavioral/TemplateMethod)
* [ ] [Visitor](Patterns/Behavioral/Visitor)

### Additional

* [ ] [Service Locator](Patterns/Other/ServiceLocator)
* [ ] [Repository](Patterns/Other/Repository)
* [ ] [Entity-Attribute-Value](Patterns/Other/Attribute)

## Domain-Driven Design (DDD) [&uarr;](#design-and-development-principles)

### What is DDD (explainable even to a child or a marketer)

DDD is an approach focused on understanding the business domain as a whole or specific business processes. It is great
for projects where business logic is complex. The goal is to reduce that complexity as much as possible.

Outside DDD, developers often focus on technology and infrastructure: how to send messages, store data, which DB to
use. DDD says these are important but secondary. Business is primary and should come first. DDD teaches developers to
speak the same language as the business. This is the Ubiquitous Language.

DDD also provides a foundation for strategic and tactical modeling. Strategic design helps identify the most important
areas based on business value. Tactical modeling helps build a working domain model using proven building blocks.

### The three pillars of DDD

Domain-Driven Design is focused on three core principles:

- Ubiquitous Language: domain experts and developers work together to create a shared language for the business domain.
  This is a single team, not opposing sides. Software development is a business investment, not just a cost. A shared
  language spreads deep domain understanding across the team.
- Strategic Design: focuses on business strategy, not just technical details. It helps identify internal relationships
  and early warning feedback loops. Technically, it protects each business service and supports service-oriented
  architecture.
- Tactical Design: provides tools and building blocks for iterative development. It helps create software that is
  correct, testable, and less error-prone.

### The DDD highlight: Bounded Context

A Bounded Context is a key DDD tool. It is an explicit boundary inside which the domain model exists. It maps the
ubiquitous language into the software model. Bounded contexts let you split code into modules, packages, or components
so changes in one have minimal impact on others.

For developers, this means you can change code without worrying about breaking other areas. For team leads, it enables
parallel work and speeds up delivery.

### How to know when to use DDD

Count the number of use cases. If you have about 10-15, business logic is not that complex and you can skip DDD.

If you have 30-50 or more UX cases and they heavily overlap, consider applying DDD at least in part of the system.

### How to introduce DDD bottom-up

Imagine you are a developer who likes DDD and wants to apply it in your company.

Starting a guerrilla adoption alone is hard. You may lack knowledge, and your team might think you are wasting time.

Start by creating an initiative group: try the approach together, understand the nuances, and practice. Then talk to
an architect or CTO about its value. Remember: DDD is not needed everywhere. It solves specific problems, so do not go
too far.

A side effect is that even aiming for DDD pushes people into a mindset of "divide, reduce coupling, and focus on
business logic." That leads to better code and faster work, even if you do not implement full DDD artifacts. The code
stays code, but quality and speed improve.

### How to introduce DDD top-down

- Make sure DDD helps in your specific case.
- Find someone with architecture skills to identify system boundaries.
- Invite DDD practitioners to teach the team.
- Refactor step by step. Not all parts need this; refactor only where business value is highest.

### How to teach DDD without them knowing

Through practice. Do not tell a person up front that you are teaching DDD.

Give tasks. Let them solve them based on their understanding of SOLID and similar ideas. When they deliver, say: "It
works, but it needs rework," and explain why.

Do not force reading. Be interactive. In 3-5 months they will start understanding DDD basics in practice and in theory.
They will recognize patterns earlier through artifacts like context maps. At first they will be confused, then they will
start to get it, and some will even read books.

### "I know DDD" is a weak resume line in the CIS

If you are in the CIS and know DDD, that is cool. But it does not mean you will use it at work. More often it signals a
high level of maturity to employers. The skills you gain by studying DDD develop you as a developer and architect.

If you plan to move abroad, that line can have a positive effect. DDD communities are larger abroad and the approach is
more popular, especially in Europe.

## Test-Driven Development (TDD) [&uarr;](#design-and-development-principles)

In software development, writing tests before code is called Test-Driven Development (TDD).

TDD is a short feedback cycle where developers:

- Write a test that fails.
- Write code that passes the test.
- Refactor the code from step two, using the test to keep it correct.

The goal of TDD is specification, not validation. It is a way to think about requirements and design before writing
functional code. TDD helps you produce clean, working code.

![image_processing20230301-45-5a81s0.png](images%2Fimage_processing20230301-45-5a81s0.png)

### TDD advantages

- Reduces reliance on debugging. Writing tests first and then coding to satisfy them often reduces debugging time.
  Writing tests requires understanding requirements deeply, so failures are easier to diagnose.
- Improves user perspective. Writing the test first forces you to think about how the user will use the feature, which
  helps with UX.
- Reduces overall development time. Although test code increases total lines, frequent testing prevents errors early and
  avoids bigger problems later.

### TDD disadvantages

- Does not favor big design. Writing the simplest test and simplest code can lead to weak overall design. It is easy to
  miss large issues while focusing on small ones.
- Not for all projects. TDD works well for small projects or components, but can be hard on very large or complex
  systems. Writing tests for complex features that are not fully understood may be very difficult. Tests that do not
  match requirements are useless and can block development. Legacy systems and third-party integrations can also make
  TDD impractical.
- Requires additional time. Although upfront tests save time later, writing them still takes significant time, which
  many developers prefer to spend on new code or refactoring.

### Summary

Test-driven development is widely used and increasingly popular. It is easier to learn than some extreme programming
methods. It requires discipline to write and run tests, but it enables test-driven development.

TDD emphasizes robust testing and directly affects software quality. This is true for small and large systems, but it
is often ignored in the rush to deliver features. Quality software is built when test code gets as much attention as
production code.

## CQRS [&uarr;](#design-and-development-principles)

CQRS stands for Command Query Responsibility Segregation. In 1980 Bertrand Meyer introduced CQS. In the early 2000s
Greg Young extended and popularized it as CQRS. CQRS separates read operations (queries) from write operations
(commands).

- Commands are task-oriented, not data-oriented. For example, "Book a hotel room" rather than "set
  ReservationStatus to reserved".
- Commands can be queued for asynchronous processing.
- Queries never modify the database. A query returns a DTO that does not encapsulate domain knowledge.

CQRS is often (but not always) implemented in bounded contexts of DDD-based applications. One natural reason is
asymmetric load and complexity between read and write subsystems. Most business rules and complex checks are in the
write subsystem, while reads are often much more frequent.

The CQRS flow looks like this:

![Screenshot from 2023-03-15 17-09-34.png](images%2FScreenshot%20from%202023-03-15%2017-09-34.png)

- CQRS (Command Query Responsibility Segregation): separates read and write operations. For example, write to master,
  read from replicas.
- ES (Event Sourcing): store all changes in state of an entity or set of entities.
- CQRS/ES: an approach where you store all state change events in an event table and add an aggregate and projector.
- Aggregate: holds in-memory properties needed for business decisions (faster writes), makes decisions, and publishes
  events.
- Projector: listens to events and writes to separate tables or databases (faster reads).

### CQRS pros

- Independent scaling. CQRS scales read and write workloads separately, reducing lock contention.
- Optimized data schemas. You can optimize schemas differently for queries and commands.
- Security. Separating operations allows more flexible access control.
- Separation of concerns. Classes become simpler and easier to maintain.
- Simpler queries. You can keep materialized views and avoid complex joins.
- Does not require two data stores. Separate stores are one possible implementation, not a requirement.

### CQRS cons

- Complexity. The idea is simple, but implementation can complicate the project, especially with Event Sourcing.
- Messaging. CQRS does not require messaging, but message brokers are often used for commands and events. This means you
  must handle failures and duplicates.
- Eventual consistency. If you split read and write stores, the read model can be stale. Keeping it up to date can be
  challenging.

## Event Sourcing [&uarr;](#design-and-development-principles)

Event sourcing is an architectural pattern where all changes to application state are stored in the order they occurred.
These records are both a source of current state and an audit log of what happened. Event sourcing decentralizes data
changes and reads. It scales well and suits systems that already use events or can migrate to event-based architecture.

Event sourcing goes hand in hand with CQRS. A "deluxe" CQRS + Event Sourcing diagram looks like this:

![event_sourcing.png](images%2Fevent_sourcing.png)

### Event Sourcing pros

- Events are immutable and can be stored with append-only operations.
- Events can be processed asynchronously.
- Event sourcing helps prevent conflicts from concurrent updates by avoiding direct updates in the data store. The
  domain model must still protect itself from inconsistent requests.
- Append-only storage provides an audit log that can be used for monitoring, rebuilding state as materialized views or
  projections, and for testing and debugging.
- Each event can be handled by multiple tasks, which simplifies integration with other services that listen for new
  events. However, event sourcing events are often low-level, so integration events may be needed.

### Event Sourcing cons

- The biggest challenge is mindset change. Developers must move away from CRUD-based entity storage and think in events.
- Event modeling requires effort. Once events are stored, they must be immutable, or history and state can be corrupted.
  The event log is the source of truth, so events must contain all information needed to reconstruct state at any time.
  Events may be reinterpreted as systems and businesses evolve.
- Event sourcing can be easy for simple logic but hard for complex domains with many relationships. Integrations with
  external systems that do not provide historical snapshots can also be difficult.
- Event sourcing scales horizontally (event logs can be separate), but this introduces additional problems such as
  troubleshooting and eventual consistency.
- Event structure can change over time. Historical events may need to be processed by new business logic. A versioned
  event schema helps distinguish new events from old ones. Periodic snapshots help separate major event structure
  changes.

### When to use Event Sourcing

- When you need to store intent, purpose, or reason. For example, changes to a customer entity can be recorded as a
  sequence of events such as Reinstated, AccountClosed, or Invalidated.
- When it is critical to minimize or eliminate update conflicts.
- When you need to record events and replay them to restore state, roll back changes, or keep history and audit logs.
  For example, when a task has multiple steps that must be replayed to restore consistency.
- When events are a standard output of the application and worth the extra implementation effort.
- When you want to split input/update processing from application of changes, for example to improve UI performance or
  distribute events to other listeners such as payment systems.
- When you need flexibility to change materialized models and entity data formats as requirements evolve, especially
  with CQRS where the read model can be adapted.
- When eventual consistency is acceptable for the read model and some performance impact is acceptable during
  rehydration.

### When not to use Event Sourcing

- Small or simple domains that work well with standard CRUD data management.
- Systems that require strong consistency and real-time updates.
- Systems that do not require rollback, replay, or audit history.
- Systems with minimal update conflicts, for example systems that mostly append data rather than update it.
