# Concurrency and Async

Learn how your language executes work in parallel or asynchronously.

## Concepts

- Processes vs threads vs coroutines
- Synchronization: locks, channels, queues
- Race conditions and deadlocks
- Backpressure and bounded queues

## Go

- Goroutines + channels, `context` for cancellation.
- Common patterns: worker pool, fan-out/fan-in.

## PHP

- Request-per-process model by default.
- Concurrency via queues, cron, or async frameworks (Swoole, ReactPHP).

## Python

- Threads for I/O, processes for CPU.
- Asyncio for event-loop based concurrency.

## Node.js

- Single-threaded event loop with async I/O.
- Worker threads for CPU-heavy work.
