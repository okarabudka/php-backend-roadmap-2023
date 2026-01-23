# README

A practical learning map for backend and frontend fundamentals.

## How to use this repo

- Follow the learning path from Beginner to Advanced; treat each module as a small milestone.
- Typical pace: 5-7 hours/week. Rough timing: Beginner 3-5 weeks, Intermediate 4-6 weeks, Advanced 4-6 weeks.
- required (for everyone): Core knowledge, Web Fundamentals, OS, one programming language, Version Control, Databases (fundamentals), APIs basics.
- optional: English, Time Management, deep dives (NoSQL, Search, advanced architecture), specific frameworks, tasks/ideas.

## Learning Path

### Beginner

- Core knowledge: start here to build learning habits and vocabulary. See [Core knowledge](#core-knowledge-every-developer-should-have).
- Web Fundamentals: how the web works end to end. See [Web Fundamentals](#web-fundamentals).
- OS and General Knowledge: processes, memory, terminal basics. See [OS and General Knowledge](#os-and-general-knowledge).
- Learn a Language: pick one and build fluency. See [Learn a Language](#learn-a-language).
- Version Control Systems: learn Git basics early. See [Version Control Systems](#version-control-systems).
- Databases (fundamentals): tables, transactions, normalization. See [Databases](#databases).
- APIs basics: REST/JSON and common patterns. See [APIs and Authentication](#apis-and-authentication).
- Frontend basics (optional): JS essentials. See [JavaScript](#javascript).

### Intermediate

- Frameworks: learn how real apps are structured. See [Frameworks](#frameworks).
- Algorithms: core data structures and complexity. See [Algorithms](#algorithms).
- Performance and Scalability: caching, observability, capacity thinking. See [Performance and Scalability](#performance-and-scalability).
- Web Security: standard threats and defenses. See [Web Security](#web-security).
- Quality and Delivery: tests and CI/CD. See [Quality and Delivery](#quality-and-delivery).
- Architecture and Patterns: structure and tradeoffs. See [Architecture and Patterns](#architecture-and-patterns).
- Design and Development Principles: patterns and best practices. See [Design and Development Principles](#design-and-development-principles).

### Advanced

- Messaging and Realtime: async systems and streaming. See [Messaging and Realtime](#messaging-and-realtime).
- Containerization vs Virtualization: deployment and runtime environments. See [Containerization vs Virtualization](#containerization-vs-virtualization).
- Tasks and practice: apply knowledge in exercises. See [Tasks](#tasks) and [JavaScript Tasks](#javascript-tasks).
- Other topics: tooling, regex, and extras. See [Backend Other Topics](#backend-other-topics).

## Contents

- [How to use this repo](#how-to-use-this-repo)
- [Learning Path](#learning-path)
- [Core knowledge every developer should have](#core-knowledge-every-developer-should-have)
- [Backend Developer Roadmap](#backend-developer-roadmap)
- [Frontend Developer Roadmap](#frontend-developer-roadmap)

## Core knowledge every developer should have [&uarr;](#contents)

### Books [&uarr;](#contents)

Goal: build a mental model of software engineering and coding standards.
Outcome: you can explain core concepts and apply them in code reviews.

- Programming:
    - Introduction to Algorithms (Thomas H. Cormen)
    - Code Complete (Steve McConnell)
    - Clean Code: A Handbook of Agile Software Craftsmanship (Robert Martin)
    - Refactoring: Improving the Design of Existing Code (Martin Fowler)

### English [&uarr;](#contents)

Goal: read docs and communicate in English without friction.
Outcome: you can navigate documentation and issue trackers confidently.

- Useful resources:
    - [ ] [Duolingo](https://www.duolingo.com/)
    - [ ] [Lingualeo](https://lingualeo.com/)

### Time Management [&uarr;](#contents)

Goal: build a sustainable learning routine.
Outcome: you can plan weekly study blocks and avoid burnout.

Time management is a set of practices for organizing time and improving how effectively it is used.

Methods:

- Pomodoro method
- Pareto principle
- ALP method
- Eisenhower matrix

### Other [&uarr;](#contents)

Goal: cover practical career and workflow basics.
Outcome: you can navigate hiring and day-to-day processes.

- [x] [Questions for an Employer](include/questions.md)
- [x] [Professional Development](include/hr.md)
- [x] [Ticketing Systems and Task Organization](include/workflow.md)

## Backend Developer Roadmap [&uarr;](#contents)

### Web Fundamentals [&uarr;](#contents)

Goal: understand how the web works from DNS to browsers.
Outcome: you can reason about latency, hosting, and delivery.

- [x] [How the Internet Works](include/internet.md#how-the-internet-works)
- [x] [Types of Network Protocols](include/internet.md#types-of-network-protocols)
- [x] [Email Protocols](include/internet.md#email-protocols)
- [x] [How a Browser Works](include/internet.md#how-a-browser-works)
- [x] [Hosting](include/internet.md#hosting)
- [x] [Domain Names](include/internet.md#domain-names)
- [x] [DNS](include/internet.md#dns)
- [x] [Proxy Servers](include/internet.md#proxy-servers)
- [x] [Server Software](include/web-servers.md#server-software)
- [x] [Nginx](include/web-servers.md#nginx)
- [x] [Apache](include/web-servers.md#apache)
- [x] [Apache vs Nginx: comparing their feature sets](include/web-servers.md#apache-vs-nginx-comparing-their-feature-sets)

### OS and General Knowledge [&uarr;](#contents)

Goal: understand OS primitives used by servers.
Outcome: you can debug basic system issues and read logs.

- [x] [How the OS Works](include/os-and-general-knowledge.md#how-the-os-works)
- [x] [Terminal](include/os-and-general-knowledge.md#terminal)
- [x] [Process Management](include/os-and-general-knowledge.md#process-management)
- [ ] [Threads and Parallelism](include/os-and-general-knowledge.md#threads-and-parallelism)
- [ ] [Memory Management](include/os-and-general-knowledge.md#memory-management)
- [ ] [Interprocess Communication](include/os-and-general-knowledge.md#interprocess-communication)
- [ ] [I/O Management](include/os-and-general-knowledge.md#io-management)
- [ ] [POSIX Basics](include/os-and-general-knowledge.md#posix-basics)
- [x] [Network Topology Concepts](include/os-and-general-knowledge.md#network-topology-concepts)

### Learn a Language [&uarr;](#contents)

Goal: reach productivity in one backend language.
Outcome: you can build small services and scripts end to end.

- [x] [Go](include/learn-a-language-go.md)
- [x] [Python](include/learn-a-language-python.md)
- [x] [PHP](include/learn-a-language-php.md)

### Frameworks [&uarr;](#contents)

Goal: learn how frameworks structure web apps.
Outcome: you can build a CRUD app with routing, auth, and persistence.

- [ ] [Laravel](include/frameworks-laravel.md)
- [ ] [Bitrix](include/frameworks-bitrix.md)

### Algorithms [&uarr;](#contents)

Goal: build algorithmic thinking and complexity awareness.
Outcome: you can choose data structures and estimate costs.

- [x] [Algorithms](include/algorithms.md)

### Version Control Systems [&uarr;](#contents)

Goal: work with Git effectively in a team.
Outcome: you can branch, merge, and review confidently.

- [x] [Version Control Systems](include/version-control-systems.md)

### Databases [&uarr;](#contents)

#### Fundamentals

Goal: understand relational data modeling and consistency.
Outcome: you can design schemas and write safe transactions.

- More about databases:
    - ORM:
        - [x] [Doctrine](include/databases.md#doctrine)
    - [x] [ACID](include/databases.md#acid)
    - [x] [Race Conditions](include/databases.md#race-conditions)
    - [x] [Transactions](include/databases.md#transactions)
    - [x] [N+1 Problem](include/databases.md#n1-problem)
    - [x] [Normalization](include/databases.md#normalization)
    - [x] [Failure Modes](include/databases.md#failure-modes)
    - [x] [Profiling](include/databases.md#profiling)

#### Scaling

Goal: keep databases fast and reliable under load.
Outcome: you can pick the right scaling strategy for a dataset.

- Scaling databases:
    - [x] [Indexes](include/databases.md#indexes)
    - [x] [Replication](include/databases.md#replication)
    - [x] [Partitioning](include/databases.md#partitioning)
    - [x] [Sharding](include/databases.md#sharding)
    - [x] [CAP Theorem](include/databases.md#cap-theorem)

#### NoSQL

Goal: understand non-relational data models.
Outcome: you can choose a NoSQL database based on access patterns.

- NoSQL databases:
    - Document DBs:
        - [x] [MongoDB](include/databases.md#mongodb)
        - [x] [CouchDB](include/databases.md#couchdb)
    - Time series:
        - [x] [InfluxDB](include/databases.md#influxdb)
        - [x] [TimeScale](include/databases.md#timescale)
    - Real-time:
        - [x] [Firebase](include/databases.md#firebase)
    - Column DB:
        - [x] [Cassandra](include/databases.md#cassandra)
        - [x] [HBase](include/databases.md#hbase)
    - Key-value:
        - [x] [Redis](include/databases.md#redis)
        - [x] [DynamoDB](include/databases.md#dynamodb)
    - Graph DBs:
        - [x] [JanusGraph](include/databases.md#janusgraph)
        - [x] [Neo4j](include/databases.md#neo4j)
        - [x] [DGraph](include/databases.md#dgraph)
        - [x] [DataStax Enterprise Graph](include/databases.md#datastax-enterprise-graph)

#### Relational

Goal: know the main SQL engines and their tradeoffs.
Outcome: you can pick a database for common workloads.

- Relational databases:
    - [x] [PostgreSQL](include/databases.md#postgresql)
    - [x] [MySQL](include/databases.md#mysql)
    - [x] [MariaDB](include/databases.md#mariadb)
    - [x] [MS SQL](include/databases.md#ms-sql)
    - [x] [Oracle](include/databases.md#oracle)

#### Search Engines

Goal: understand full-text search basics.
Outcome: you can decide when to add a search engine.

- Search engines:
    - [x] [Elasticsearch](include/search-engines.md#elasticsearch)
    - [x] [Sphinx](include/search-engines.md#sphinx)
    - [x] [Manticore](include/search-engines.md#manticore)
    - [x] [Solr](include/search-engines.md#solr)

### APIs and Authentication [&uarr;](#contents)

Goal: design APIs and secure access end to end.
Outcome: you can pick an API style, document it, and implement auth safely.

- [x] [REST](include/learn-about-apis.md#rest)
- [x] [REST vs SOAP (comparison)](include/learn-about-apis.md#rest-and-soap)
- [x] [SOAP](include/learn-about-apis.md#soap)
- [x] [JSON APIs](include/learn-about-apis.md#json-apis)
- [x] [gRPC](include/learn-about-apis.md#grpc)
- [x] [GraphQL](include/learn-about-apis.md#graphql)
- [x] [OpenAPI (Swagger)](include/learn-about-apis.md#openapi-specs)
- [x] [HATEOAS](include/learn-about-apis.md#hateoas)
- Authentication:
    - [x] [Cookie-based](include/learn-about-apis.md#cookie-based)
    - [x] [OAuth](include/learn-about-apis.md#oauth)
    - [x] [Basic Auth](include/learn-about-apis.md#basic-auth)
    - [x] [Token-based Auth](include/learn-about-apis.md#token-based-auth)
    - [x] [JWT](include/learn-about-apis.md#jwt)
    - [x] [OpenID](include/learn-about-apis.md#openid)
    - [x] [SAML](include/learn-about-apis.md#saml)

### Performance and Scalability [&uarr;](#contents)

#### Caching

Goal: reduce latency and load.
Outcome: you can apply caching with correct invalidation.

- Caching:
    - [x] [Client-side](include/caching.md#client-side)
    - [x] [CDN](include/caching.md#cdn)
    - Server-side:
        - [x] [OPcache](include/caching.md#opcache)
        - [x] [Redis](include/caching.md#redis)
        - [x] [Memcached](include/caching.md#memcached)
        - [x] [Redis vs Memcached](include/caching.md#redis-vs-memcached)

#### Building for scale

Goal: understand system bottlenecks and mitigation.
Outcome: you can plan scalability strategies for a service.

- Building for scale:
    - [x] [Building for Scale](include/building-for-scale.md)
    - [x] [Instrumentation](include/building-for-scale.md#instrumentation)
    - [x] [Backend Monitoring](include/building-for-scale.md#backend-monitoring)
    - [x] [Frontend Monitoring](include/building-for-scale.md#frontend-monitoring)
    - [x] [Telemetry](include/building-for-scale.md#telemetry)
    - [x] [Mitigation Strategies](include/building-for-scale.md#mitigation-strategies)
        - [x] [Graceful Degradation](include/building-for-scale.md#graceful-degradation)
        - [x] [Throttling](include/building-for-scale.md#throttling)
        - [x] [Backpressure](include/building-for-scale.md#backpressure)
        - [x] [Load Shifting](include/building-for-scale.md#load-shifting)
        - [x] [Circuit Breaker](include/building-for-scale.md#circuit-breaker)
    - [x] [Migration Strategies](include/building-for-scale.md#migration-strategies)
    - [x] [Horizontal/Vertical Scaling](include/building-for-scale.md#horizontal-vertical-scaling)
    - [x] [Observability](include/building-for-scale.md#observability)
    - [x] [PHP Performance Boosting Techniques](include/building-for-scale.md#php-performance-boosting-techniques)

### Web Security [&uarr;](#contents)

Goal: learn common vulnerabilities and defenses.
Outcome: you can audit endpoints and apply security basics.

- [x] [Vulnerabilities](include/web-security-knowledge.md#vulnerabilities)
- [x] [HTTPS](include/web-security-knowledge.md#https)
- [x] [OWASP Security Risks](include/web-security-knowledge.md#owasp-security-risks)
- [x] [CORS](include/web-security-knowledge.md#cors)
- [x] [SSL/TLS](include/web-security-knowledge.md#ssl-tls)
- [x] [Content Security Policy (CSP)](include/web-security-knowledge.md#content-security-policy-csp)
- [x] [Server Security](include/web-security-knowledge.md#server-security)
- [x] [Hash Algorithms](include/web-security-knowledge.md#hash-algorithms)

### Quality and Delivery [&uarr;](#contents)

Goal: ship safely with tests and automation.
Outcome: you can design a basic CI/CD pipeline.

- [x] [Integration Testing](include/testing.md#integration-testing)
- [x] [Unit Testing](include/testing.md#unit-testing)
- [x] [Functional Testing](include/testing.md#functional-testing)
- [x] [Deployment](include/ci-cd.md)

### Architecture and Patterns [&uarr;](#contents)

Goal: understand how systems are structured.
Outcome: you can evaluate tradeoffs between architectures.

- [x] [Architecture](include/software-design-and-architecture.md)
- [x] [Monolithic Apps and Microservices](include/architectural-patterns.md#monolithic-apps-and-microservices)
- [x] [Hexagonal Architecture](include/architectural-patterns.md#hexagonal-architecture)
- [x] [SOA](include/architectural-patterns.md#soa)
- [x] [Serverless](include/architectural-patterns.md#serverless)
- [x] [Service Mesh](include/architectural-patterns.md#service-mesh)
- [x] [Twelve-Factor Apps](include/architectural-patterns.md#twelve-factor-apps)

### Design and Development Principles [&uarr;](#contents)

Goal: learn core principles for maintainable code.
Outcome: you can refactor and design with intent.

- [x] [KISS, DRY, YAGNI, BDUF, SOLID, APO, and Occam's Razor](include/design-and-development-principles.md#kiss-dry-yagni-bduf-solid-apo-and-occams-razor)
- [x] [Patterns and Anti-patterns](include/design-and-development-principles.md#patterns-and-anti-patterns)
- [x] [Design Patterns](include/design-and-development-principles.md#design-patterns)
- [x] [Domain-Driven Design](include/design-and-development-principles.md#domain-driven-design)
- [x] [Test-Driven Development](include/design-and-development-principles.md#test-driven-development)
- [x] [CQRS](include/design-and-development-principles.md#cqrs)
- [x] [Event Sourcing](include/design-and-development-principles.md#event-sourcing)

### Messaging and Realtime [&uarr;](#contents)

Goal: understand async communication and streaming.
Outcome: you can design a system with queues and realtime updates.

- [x] [RabbitMQ](include/message-brokers.md#rabbitmq)
- [x] [Kafka](include/message-brokers.md#kafka)
- [x] [Key Differences Between Apache Kafka and RabbitMQ](include/message-brokers.md#key-differences-between-apache-kafka-and-rabbitmq)
- [x] [WebSockets](include/websockets.md)
- [x] [Short polling, long polling, WebSockets, and server-sent events](include/server-sent-events.md#short-polling-long-polling-websockets-and-server-sent-events)

### Containerization vs Virtualization [&uarr;](#contents)

Goal: understand how apps are packaged and deployed.
Outcome: you can run services in containers and reason about isolation.

- [x] [Docker](include/containerization-vs-virtualization.md#docker)
- [x] [Kubernetes](include/containerization-vs-virtualization.md#kubernetes)
- [x] [LXC](include/containerization-vs-virtualization.md#lxc)

### Tasks [&uarr;](#contents)

Goal: practice with focused exercises.
Outcome: you can apply knowledge in small tasks.

- [ ] [PHP](include/tasks-php.md)
- [ ] [SQL](include/tasks-sql.md)
- [ ] [Algorithms](include/tasks-algorithms.md)
- [ ] [Other](include/tasks-other.md)
- [ ] [Ideas](include/ideas.md)

### Backend Other Topics [&uarr;](#contents)

Goal: cover helpful tooling and deep dives.
Outcome: you can apply these topics as needed.

- [x] [Composer](include/other-info.md#composer)
- [x] [Coding Standards](include/other-info.md#coding-standards)
- [x] [Steps to Optimize a Website](include/other-info.md#steps-to-optimize-a-website)
- [x] [Key Differences Between Scripting and Compiled Languages](include/other-info.md#key-differences-between-scripting-and-compiled-languages)
- [x] [Regular Expressions](include/regular-expressions.md#regular-expressions)
- [x] [Regular Expression Functions in PHP](include/regular-expressions.md#regular-expression-functions-in-php)

## Frontend Developer Roadmap [&uarr;](#contents)

### JavaScript [&uarr;](#contents)

Goal: master JS fundamentals for frontend work.
Outcome: you can build small interactive interfaces.

- [ ] [JavaScript](include/javascript.md)

### JavaScript Tasks [&uarr;](#contents)

Goal: practice JS through exercises.
Outcome: you can write clean, correct solutions.

- [ ] [JavaScript Tasks](include/tasks-javascript.md)
