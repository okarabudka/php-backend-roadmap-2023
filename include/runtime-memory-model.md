# Runtime and Memory Model

Understand how your language executes code and uses memory.

## Core concepts

- Stack vs heap allocation
- Value vs reference semantics
- Garbage collection or refcounting
- Escape analysis and allocations
- Memory leaks and how to detect them

## Go

- Garbage-collected, with escape analysis and stack growth.
- Value types by default, references via pointers, slices, maps, channels.
- Common pitfalls: unintended allocations, goroutine leaks.

## PHP

- Reference counting with a cycle collector.
- Copy-on-write behavior for arrays and strings.
- Common pitfalls: large arrays, copying, long-running workers.

## Python

- Reference counting + cyclic GC.
- Everything is an object, frequent allocations.
- Common pitfalls: reference cycles, global interpreter lock (GIL).

## Node.js

- V8 GC with generational heap.
- Event loop and async I/O.
- Common pitfalls: memory leaks from listeners and caches.
