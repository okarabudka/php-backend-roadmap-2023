# Message Brokers

#### Links

- [Apache Kafka and RabbitMQ: what is the difference](https://habr.com/ru/company/southbridge/blog/666326/)
- [RabbitMQ terminology and basic entities](https://habr.com/ru/company/southbridge/blog/703060/)

## RabbitMQ [&uarr;](#message-brokers)

RabbitMQ is a distributed, open-source message broker that delivers messages efficiently across complex routing
scenarios. It is called "distributed" because it typically runs as a cluster where queues are replicated across nodes
for high availability and fault tolerance.

RabbitMQ uses the AMQP 0.9.1 protocol by default and supports extensions for AMQP 1.0, HTTP, STOMP, and MQTT. It
officially supports Elixir, Go, Java, JavaScript, .NET, PHP, Python, Ruby, Objective-C, Spring, and Swift. A variety of
community-supported tools and clients are also available.

Developers use RabbitMQ for high-throughput, reliable background jobs and for application-to-application integration.
It supports complex routing to consumers and is well suited for integrating multiple apps and services with
non-trivial routing logic.

RabbitMQ is a great fit for web servers that need fast request/response handling. It can distribute load between
workers under high traffic (20,000+ messages per second) and handle background tasks such as PDF conversion, file scans,
or image processing.

## Kafka [&uarr;](#message-brokers)

Apache Kafka is a distributed, open-source streaming platform built for high throughput. Written in Java and Scala,
Kafka is a Pub/Sub message bus designed for streams and replayable data flows. Kafka does not rely on queues; it appends
messages to a log and keeps them until the retention limit is reached or consumers have read them.

Apache Kafka is best suited for streaming data from A to B without complex routing, but at maximum throughput. It
excels at event sourcing, stream processing, and modeling system changes as event sequences. Kafka can also handle data
in multi-stage pipelines.

Kafka is a strong choice when you need a framework for storing, reading, re-reading, and analyzing streaming data. Its
strength is real-time processing and analytics. It is ideal for long-term message retention and systems that are
regularly replayed.

## Key Differences Between Apache Kafka and RabbitMQ [&uarr;](#message-brokers)

- Data flow: RabbitMQ uses a bounded flow where producers send messages and consumers receive them. Kafka uses an
  unbounded stream of key-value pairs delivered to topics continuously.
- Data usage: RabbitMQ is great for user requests and transactional data (orders, payments). Kafka is better for
  operational data like telemetry, audits, and system activity.
- Messaging model: RabbitMQ removes messages from the queue after they are processed and acknowledged. Kafka is a log
  that retains messages until the retention period expires.
- Design model: RabbitMQ uses a smart-broker/dumb-consumer model, where the broker tracks consumer status. Kafka uses a
  dumb-broker/smart-consumer model. It does not track what each consumer read; it just retains data for a configured
  time. Consumers track their own offsets.
- Topology: RabbitMQ uses exchange-queue bindings to route messages to consumers. Kafka uses a publish/subscribe
  topology, delivering messages to topics and consumer groups.
