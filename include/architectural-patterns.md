# Architectural Patterns

#### Links

- [Microservices vs Monolith](https://habr.com/ru/company/yandex_praktikum/blog/570024/)
- [Microservices - alienation from results of labor](https://habr.com/ru/post/709328/)
- [Modular PHP monolith: a recipe](https://habr.com/ru/company/ispring/blog/560074/)
- [Modular monolith. Start](https://habr.com/ru/company/dododev/blog/650721/)
- [Hexagonal architecture and how I got there](https://alexkosarev.name/2020/06/12/hexagonal-architecture/)
- [Hexagonal architecture and Domain Driven Design with a front-end app example](https://habr.com/ru/post/654629/)
- [Hexagonal architecture](https://habr.com/ru/post/267125/)
- [What is service-oriented architecture?](https://aws.amazon.com/ru/what-is/service-oriented-architecture/)
- [Service-oriented architecture (SOA)](https://habr.com/ru/company/vk/blog/342526/)
- [Best architecture for MVP: monolith, SOA, microservices, or serverless? Part 1](https://habr.com/ru/company/otus/blog/476024/)
- [Best architecture for MVP: monolith, SOA, microservices, or serverless? Part 2](https://habr.com/ru/company/otus/blog/477930/)
- [What is a service mesh in simple terms](https://habr.com/ru/company/southbridge/blog/705914/)
- [Twelve-Factor App](https://12factor.net/ru/)
- [Twelve-Factor App in simple words](https://habr.com/ru/post/261171/)

## Monolithic Apps and Microservices [&uarr;](#architectural-patterns)

A monolithic app is a single shared module, while microservices architecture is a set of small independently deployed
services. Which is better depends on many factors.

In 2009, Netflix faced growth problems. Its infrastructure could not keep up with demand for video streaming. Netflix
moved from private data centers to the public cloud and shifted from a monolithic architecture to microservices. The
term "microservices" did not exist yet, so there was little documentation.

Netflix became one of the first large organizations to successfully move from monolith to cloud microservices. In 2015
it received a JAX jury prize, partly because the new infrastructure adopted DevOps practices. Today Netflix runs more
than a thousand microservices. They manage platform components, and developers deploy code frequently (thousands of
deploys per day).

Netflix was one of the first to switch to microservices, which are increasingly popular today.

![Monolith Vs Microservice image.png](images%2FMonolith%20Vs%20Microservice%20image.png)

### Monolithic architecture

Monolithic architecture is the traditional software model: one large module that runs autonomously and independently of
other applications. "Monolith" often implies something big and clumsy, which fits this architecture. It is a large
computing unit with a single codebase that combines all business tasks. To change a monolith, you update the whole
stack, rebuild, and redeploy the updated interface. This limits updates and takes time.

Monoliths are convenient at early project stages: deployment is simpler and you avoid complex coordination. You ship
all functionality together.

![Monolithic architecture@2x.png](images%2FMonolithic%20architecture%402x.png)

#### Advantages of monolithic architecture

- Simple deployment. One executable or directory simplifies release.
- Development. A single codebase is easier to work with.
- Performance. One API interface often does the work that multiple APIs do in microservices.
- Simpler testing. End-to-end testing is faster because the app is a single module.
- Easier debugging. All code is in one place.

#### Disadvantages of monolithic architecture

- Slower development. Large monoliths are complex and slow down teams.
- Scalability. You cannot scale individual components.
- Reliability. A bug in one module can affect the whole app.
- Technology lock-in. Changes in language or infrastructure affect the entire app and can be costly.
- Limited flexibility. The app is constrained by its chosen stack.
- Deployment. Small changes require full redeploys.

### Microservices architecture

Microservices architecture is a method of organizing systems as a set of independently deployed services. Each service
has its own business logic and database. Updates, testing, deployment, and scaling happen within each service.
Microservices break large business tasks into independent codebases. They do not reduce complexity, but make it visible
and manageable by dividing work into smaller independent processes.

Microservices are tightly linked to DevOps, because they are the foundation of continuous delivery and fast adaptation
to user needs.

![Microservice architecture@2x.png](images%2FMicroservice%20architecture%402x.png)

#### Advantages of microservices

- Flexibility. Small teams can deploy frequently.
- Flexible scaling. When a service hits its limit, you can deploy more instances and distribute load. With stateless
  services, clients can be spread across instances and handle larger scale.
- Continuous deployment. Releases can happen multiple times per day rather than weekly.
- Easier maintenance and testing. Teams can experiment and rollback. Bugs are easier to find in smaller services.
- Independent deployment. Services are separate modules and can be deployed independently.
- Technology freedom. Teams can choose tools that fit their needs.
- High reliability. Deploy changes to one service without breaking the whole system.
- Happier teams. Teams gain autonomy and can deploy without long approval cycles.

#### Disadvantages of microservices

- Process sprawl. Many services across teams complicate development and operations.
- Higher infrastructure costs. Each service needs its own pipelines, hosting, and monitoring.
- Organizational overhead. Teams need more communication to coordinate interfaces and updates.
- Debugging complexity. Each service has its own logs; tracing business flows becomes harder.
- Lack of standardization. Without a platform, languages, logging, and monitoring standards diverge.
- Unclear ownership. As services grow, it becomes harder to know who owns what.

## Hexagonal Architecture [&uarr;](#architectural-patterns)

Hexagonal architecture is a layered architecture, also called ports and adapters. It uses the concept of ports that can
be adapted to connect different layers.

### Purpose

- Lets users, programs, automated tests, and batch scripts interact with the application.
- Allows development and testing without additional devices or databases.

### Why a hexagon

Although the name implies six sides, the idea is that the figure has many sides. Each side is a port that provides
access to the app or connects it to the outside world.

A port is a channel for inbound requests or data. For example, HTTP requests come through an HTTP port (browser
requests, API) and are converted into application commands. Similarly, message brokers or any system using a messaging
protocol (for example AMQP) are also ports. These are inbound ports. Other ports expose data access from the app, such as
a database port.

### Core: ports and adapters

- Ports are the interfaces of your application.
- Adapters are implementations of your ports.
- The hexagon represents a layered or multi-faceted architecture.

### Advantages

- Independence. Focus on business logic; you can design the app without external services and use mocked data in
  adapters.
- Flexibility. Use any frameworks, move adapters between projects, and add new adapters without changing core code.
- Easy change. Changes in one area do not affect others.

### Drawbacks

- Onboarding. It can be hard to learn at first. Many developers (including me) reject it as overkill until they use it.
- Implementation may be difficult with GraphQL.

### Application layers

1) Domain layer

The domain layer is the core. It contains business logic and defines how outer layers interact with it. In addition to
core logic, it often includes domain events (events emitted at key business points) and use cases (what the application
should do).

2) Application layer

This layer orchestrates actions on domain entities. It adapts requests from the framework layer and isolates the domain
layer. It can contain handlers that execute use cases. These handlers take input from the framework layer and execute
required actions for the use case. They can also emit domain events.

3) Framework layer

The app is wrapped in a framework layer (also called infrastructure layer). It contains code your app uses, but it is
not part of the app itself. Usually this includes the framework, but can also include third-party libraries, SDKs, and
other code. For example, everything installed via composer in PHP. This layer exists to fulfill the needs of the app.

### Layer boundaries

Each layer defines how other layers can interact with it. Interfaces live at the boundary of each layer. These
interfaces are ports, and adapters in the next layer implement them.

### SOLID as a foundation

Strictly following SOLID means many small interfaces instead of a few large ones. Classes implementing them can vary.

A helpful approach: one class implements one interface. Each class then has minimal dependencies and code, just like its
tests. This atomization allows building very different services from one codebase:

- A modular monolith that provides the full project API.
- A set of microservices, each providing its domain API.
- Separate microservices for query and command APIs using CQRS.
- Even a separate microservice per API method, leading to FaaS.

Thus hexagonal architecture can be a strong foundation for microservices.

An alternative is to implement multiple related interfaces in one class, while keeping the option to split it later.

## SOA [&uarr;](#architectural-patterns)

Service-oriented architecture (SOA) is a software design approach that uses software components called services to
build business applications. Each service provides business capabilities, and services can interact across platforms and
languages. Developers use SOA to reuse services across systems or combine multiple independent services to perform
complex tasks.

For example, multiple business processes may need user authentication. Instead of rewriting auth code for each process,
you can create one auth service and reuse it. Similarly, healthcare systems (patient management, EHR) can call a shared
patient registration service.

SOA is broken into smaller, moderately coupled services and tends to be slower to develop. Microservices are very small,
loosely coupled independent services with faster development and continuous integration.

### SOA pros

- Reuse of services. Autonomous, loosely coupled components can be reused across multiple apps.
- Easier maintenance. Each service is independent and can be updated without affecting others.
- Higher reliability. Services are easier to debug and test than large monoliths.
- Parallel development. Services can be developed in parallel.

### SOA cons

- Management complexity. Each service must deliver messages on time. Message volume can be huge and hard to manage.
- High upfront cost. SOA requires significant investment in people, tech, and development.
- Extra overhead. In SOA, input data is validated before one service interacts with another. With many services this
  increases latency and lowers performance.

### Summary

SOA is best for complex enterprise systems, for example banking. It is hard to split a bank system into microservices,
and a monolith is risky because one failure can break everything. SOA provides isolated services for complex apps.

## Serverless [&uarr;](#architectural-patterns)

Serverless architecture is a cloud approach for building and running apps without managing infrastructure. Code
execution is handled by the platform, so developers can deploy without worrying about server maintenance. "Serverless"
does not mean there are no servers. Apps still run on servers, but a cloud provider (for example AWS) is fully
responsible for them. Serverless removes the need for additional resources, scaling, server maintenance, storage, and
DB operations.

Serverless includes two concepts:

- FaaS (Function as a Service): upload pieces of functionality to the cloud and run them independently.
- BaaS (Backend as a Service): outsource backend aspects (DB, storage, hosting, auth) and build only the frontend
  portion.

![ru4ojwr0vxrls92nklq9wa7mtne.png](images%2Fru4ojwr0vxrls92nklq9wa7mtne.png)

With serverless, developers focus on the product, not servers. This helps build reliable and scalable products.

There are many cloud providers. Some leading serverless vendors:

![gwmic_96lcls-8fiahlbeq01eyc.png](images%2Fgwmic_96lcls-8fiahlbeq01eyc.png)

### Serverless pros

- Simple deployment. Developers do not manage infrastructure and can focus on code. Serverless deployment often takes
  hours or days, not weeks.
- Lower costs. You pay only for CPU cycles and memory you use. You can offload DB and server management.
- Improved scalability. Serverless scales automatically as load or user base grows. It can handle huge bursts that would
  overwhelm traditional apps.

### Serverless cons

- Vendor lock-in. You give a provider control over operations. Migration can be hard.
- Not for long tasks. Serverless is best for short real-time tasks. Tasks over five minutes often require extra
  functions.

### Summary

Serverless is good for one-off tasks and support processes. It works well for client-heavy apps and rapidly growing
products that need unlimited scale.

When to choose each of the four architecture types:

![k9iezo5lqdya5bqv-a7gtgqofke.png](images%2Fk9iezo5lqdya5bqv-a7gtgqofke.png)

## Service Mesh [&uarr;](#architectural-patterns)

A service mesh controls how application parts exchange data. Unlike other systems, it is a separate infrastructure
layer embedded into the application. This layer documents how well microservices interact, making it easier to
optimize communication and avoid downtime as the app grows.

The hardest part of microservices is not building services, but ensuring communication between them. One service may
need data from several others. If some services are overloaded, a service mesh helps: it routes requests between
services and optimizes collaboration across the app.

## Twelve-Factor Apps [&uarr;](#architectural-patterns)

Today software is delivered as services called web apps or SaaS. The twelve-factor methodology defines SaaS apps that:

- Use a declarative format for setup and configuration, minimizing onboarding time for new developers.
- Have a contract with the OS for maximum portability between execution environments.
- Are suitable for deployment on modern cloud platforms without server administration.
- Minimize differences between development and execution environments, enabling continuous deployment.
- Can scale without major changes in tooling, architecture, or practices.

The methodology applies to any language and any combination of backing services (databases, queues, caches, and so on).

### One app - one repository

All app code should be in version control and be deployed for dev, test, and production from one repository. This does
not exclude branch-specific deployments that are not released yet.

If multiple apps share code, move it to a separate library and declare it as a dependency. If one repository contains
multiple loosely coupled apps, split them so each is a twelve-factor app.

### Explicit dependencies

Apps must not have implicit dependencies. All dependencies (system and library) should be declared in a dependency
manifest. Modern languages provide package managers and manifests. Dependencies should be isolated so system libraries
cannot leak into the app.

For example, Ruby uses Gemfile and `bundle exec` for isolation. This helps consistent behavior across platforms and
faster onboarding of new developers. Docker also isolates and makes OS dependencies explicit.

### Config belongs in the environment

Config is everything that changes between environments:

- DB logins, passwords, and addresses
- third-party services and API keys

Code does not depend on environment; configuration does. Keep code in the repo and config in the environment. If you
can open-source your code without leaking credentials, you do it right.

A common approach is predefined configs (development, test, production). This is not ideal, because adding new
environments (development-joe, qa, staging) grows configuration combinatorially.

### Local and third-party services

Backing services include databases, mail services, caches, and third-party APIs. A twelve-factor app does not
distinguish local and remote services. Each service is an attached resource; connection details belong in config.

Switching a local DB to Amazon RDS or a local mail server to a hosted one should not change the code.

### Separate build, release, and run

Deployment has three stages:

- Build: transform code into an executable package (download dependencies, compile assets).
- Release: combine build with config; the release is ready to run.
- Run: execute one or more processes from the release.

These stages should be strictly separated. Build is initiated when developers are ready to ship. After build, you should
not change code in the release. Run should be a simple operation that can be automated after crashes or failures.

### The app is a set of processes

The app should run as one or more stateless processes. It may use memory or disk as a temporary cache (for example for
image processing), but user data must be stored in a backing service.

This is especially important for session data, because the next user request may hit another process due to failure or
restart.

### The app does not depend on a server

A PHP app can run inside Apache HTTPD, or a Java app inside Tomcat. A twelve-factor app is self-contained and does not
rely on a specific web server.

This is implemented by adding a web server library dependency such as Tornado in Python, Thin in Ruby, Jetty in Java,
or ReactPHP in PHP.

### Scale by processes

Different tasks should be handled by different process types. For example, HTTP requests are handled by a web process,
while long tasks are handled by worker processes. This lets you scale only the needed process type.

Processes should not be daemonized (they should run, not be forked into background). A process manager should control
stdout and react to errors and crashes.

### Fast startup and graceful shutdown

This follows from stateless processes. Maximize reliability by using processes that start quickly and exit gracefully,
even on crashes.

Background workers should return their job to the queue, and request handlers should finish in-flight requests. Each
process task should be re-runnable (for example via transactions).

### Dev/prod parity

There is usually a big gap between development and deployment. Twelve-factor encourages bringing them close:

- Time: code should reach production within hours after it is written.
- People: developers should participate in deploying their code and observe it in production.
- Tools: dev should match test as much as possible (OS, backing services).

### Logs to stdout

Logs are event streams and should be treated as such. The app should not write logs to files or manage them (archive,
rotate, delete). A twelve-factor app writes logs to stdout. A process manager should send logs to a log analysis or
archiving system.

This lets you aggregate events from multiple processes and services. Log analysis tools can analyze current state and
past activity.

In development, logs are viewed in the console.

### Admin tasks

One-off admin processes (migrations, data fixes) must follow the same rules as other processes:

- Task code lives in the repo, aligned with the main app.
- Dependencies are declared in the main manifest so tasks can run in a normal deploy.
- Task config comes from environment variables to run in different environments.
