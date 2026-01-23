# Interoperability

How a language works with databases, queues, and external APIs.

## Databases

- SQL drivers: connection pooling, migrations, retries.
- ORM usage: when to use, when to avoid.
- Transactions: isolation levels and safe defaults.

## Messaging and queues

- At-least-once delivery semantics.
- Idempotency keys for consumers.
- Dead letter queues and retries.

## External APIs

- HTTP clients, timeouts, and retries.
- Circuit breakers and rate limits.
- Schema validation for responses.

## Go and PHP notes

- Go: prefer context-aware clients with timeouts.
- PHP: prefer persistent connections where available and configure timeouts.
