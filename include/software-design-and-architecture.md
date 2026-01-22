# Software Design and Architecture

## Enterprise Patterns [&uarr;](#software-design-and-architecture)

Enterprise patterns are a set of design patterns commonly used in enterprise software development. They provide a common
vocabulary and best practices for solving problems that arise in large, complex systems. Examples include:

- Domain-Driven Design (DDD)
- Model-View-Controller (MVC)
- Service-Oriented Architecture (SOA)
- Command and Query Responsibility Segregation (CQRS): separates read and write operations for a data store
- Event Sourcing
- Microservices
- Event-Driven Architecture (EDA)

These patterns improve maintainability and scalability by separating concerns and enabling modular, flexible
architecture.

## Programming Paradigms [&uarr;](#software-design-and-architecture)

A programming paradigm is a fundamental style of solving problems with a programming language. Different paradigms
organize code in different ways and have different strengths and weaknesses. Common paradigms include:

- Imperative programming: based on sequences of instructions that change program state. Early examples are machine code
  and assembly. High-level imperative languages include C, C++, and Java.
- Functional programming: treats computation as the evaluation of functions in the mathematical sense (as opposed to
  subroutines in procedural programming).
- Object-oriented programming: models tasks as objects that send messages to each other. Objects have properties and
  methods. Core ideas: abstraction, encapsulation, polymorphism.
- Declarative programming: describes the desired result without detailing how to achieve it. Examples: HTML and SQL.
- Structured programming: breaks programs into blocks (subroutines). The main control structures are sequence, branch,
  and loop.

## Architectural Styles [&uarr;](#software-design-and-architecture)

Architectural styles define the overall design and organization of a software system, and the principles and patterns
that guide its design. They provide a general framework that helps ensure systems are well-structured, maintainable, and
scalable.

Common architectural styles:

- Microservices: the system is a collection of small, independent, loosely coupled services.
- Event-driven: the system reacts to specific events rather than being continuously polled for changes.
- Layered: the system is divided into layers, each with a specific responsibility and well-defined interfaces.
- Service-oriented: the system is built as a collection of services accessed over a network.
- Data-centric: the system focuses on data storage, retrieval, and manipulation.
- Component-based: the system is composed of reusable and independent software components.
- Domain-driven: the system is organized around the core business domain and entities.

## Architectural Patterns [&uarr;](#software-design-and-architecture)

Architectural patterns are proven solutions for specific types of systems. They provide a common vocabulary and best
practices for designing and building software. Common patterns include:

- Model-View-Controller (MVC): separates UI, business logic, and data storage.
- Microservices: independent services that communicate over a network.
- Event-driven: systems that respond to events.
- Layered: a system organized into layers, each serving the layer above.
- Pipe-and-filter: independent processing elements connected in a pipeline.
- Command-Query Responsibility Segregation (CQRS): separates commands (writes) from queries (reads).
- Blackboard: a centralized repository accessed and modified by independent modules.
- Microkernel: minimizes kernel-mode code and moves functionality to user-mode processes.
- Serverless: build and run apps without managing servers.
- Message queues and streams: decouple components and enable async communication.
- Event sourcing: stores all state changes as a sequence of events rather than only the current state.
