# DevMap

A personal learning map for backend (mainly PHP) and frontend fundamentals, with notes per topic and PHP examples of
design patterns.

## Context

Started in December 2022 and maintained until January 2026 as a structured place to collect study notes while growing
as a PHP backend developer: web fundamentals, databases, APIs, scaling, security, architecture and design principles,
plus career and language-learning material. Most of the content was written in 2023 and 2024; in January 2026 the
files were translated, standardised and reorganised into the current roadmap with a goal and an expected outcome for
every section. It is a knowledge base, not a software project.

## Features

The roadmap is organised into sections, each with a goal, an expected outcome and a checklist linking to notes in
[`include/`](include):

- **Core knowledge**: recommended books, English, time management, questions for an employer
  ([questions.md](include/questions.md)), professional development ([hr.md](include/hr.md)), ticketing and task
  organisation ([workflow.md](include/workflow.md))
- **Web fundamentals**: how the internet, browsers, DNS, hosting and proxies work
  ([internet.md](include/internet.md)); Nginx and Apache ([web-servers.md](include/web-servers.md))
- **OS and general knowledge**: processes, terminal, network topology
  ([os-and-general-knowledge.md](include/os-and-general-knowledge.md))
- **Languages**: [PHP](include/learn-a-language-php.md), [Go](include/learn-a-language-go.md),
  [Python](include/learn-a-language-python.md); frameworks [Laravel](include/frameworks-laravel.md) and
  [Bitrix](include/frameworks-bitrix.md)
- **Algorithms** ([algorithms.md](include/algorithms.md)) and **version control**
  ([version-control-systems.md](include/version-control-systems.md))
- **Databases**: ACID, transactions, race conditions, N+1, normalisation, indexes, replication, partitioning,
  sharding, CAP theorem, relational and NoSQL engines ([databases.md](include/databases.md)); search engines
  ([search-engines.md](include/search-engines.md))
- **APIs and authentication**: REST, SOAP, gRPC, GraphQL, OpenAPI, HATEOAS, OAuth, JWT, OpenID, SAML
  ([learn-about-apis.md](include/learn-about-apis.md))
- **Performance and scalability**: caching ([caching.md](include/caching.md)), monitoring, mitigation strategies
  such as throttling, backpressure and circuit breakers ([building-for-scale.md](include/building-for-scale.md))
- **Web security**: OWASP risks, HTTPS/TLS, CORS, CSP, hashing
  ([web-security-knowledge.md](include/web-security-knowledge.md))
- **Quality and delivery**: unit, integration and functional testing ([testing.md](include/testing.md)), CI/CD
  ([ci-cd.md](include/ci-cd.md))
- **Architecture and principles**: monoliths and microservices, hexagonal architecture, SOA, serverless, twelve-factor
  apps ([architectural-patterns.md](include/architectural-patterns.md)); KISS, DRY, SOLID, DDD, TDD, CQRS, event
  sourcing ([design-and-development-principles.md](include/design-and-development-principles.md))
- **Design patterns in PHP**: creational, structural and behavioural patterns with explanations and code
  ([include/Patterns](include/Patterns))
- **Languages and tooling** (2026 additions): language choice matrix, runtime and memory model, concurrency, build and
  deploy, testing and profiling per language
- **Messaging and realtime**: RabbitMQ, Kafka ([message-brokers.md](include/message-brokers.md)), WebSockets, SSE
- **Containers**: Docker, Kubernetes, LXC
  ([containerization-vs-virtualization.md](include/containerization-vs-virtualization.md))
- **Practice tasks**: PHP, SQL, algorithms, JavaScript
- **Additional materials**: CV tips, English and German vocabulary and interview preparation
  ([include/materials](include/materials))

Checked items in the section checklists mark topics that are already covered by notes.

## Tech stack

- Markdown
- PHP (design pattern examples)

## Architecture

- `README.md`: the roadmap overview
- `include/*.md`: one note file per topic, linked from the roadmap with section anchors
- `include/Patterns/<Creational|Structural|Behavioral|Other>/<Pattern>/`: a `README.md` per pattern and, for most
  patterns, a PHP implementation with a test file
- `include/images/`: diagrams and screenshots used by the notes
- `include/materials/`: career and language-learning material

## Getting started

Browse the notes on GitHub, or clone the repository and open it in any Markdown viewer:

```bash
git clone https://github.com/okarabudka/devmap.git
```

## Testing

There are no automated tests. The pattern folders contain PHPUnit-style test files written against the legacy
`PHPUnit_Framework_TestCase` API, but there is no Composer setup or test configuration to run them.

## Status

Not actively developed; last reorganised in January 2026.

## License

MIT, see [LICENSE](LICENSE).
