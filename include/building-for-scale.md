# Building for Scale

Scalability is the ability of a system to handle a growing amount of work by adding resources.

Software designed with scalable architecture can support higher workloads without fundamental changes, but this is not
magic. Smart design helps, but at some point you still need more resources.

Key aspects of scalable systems:

- Coupling
- Observability
- Evolvability
- Infrastructure

For infrastructure, there are two main approaches: on-premises resources or a cloud provider. The main difference is
flexibility. In the cloud you can scale with a few clicks; on-premises requires more planning.

## Instrumentation [&uarr;](#building-for-scale)

Instrumentation is measuring a product's performance to diagnose errors and record trace information. It can be source
instrumentation or binary instrumentation.

Output:

- Profiling: measuring dynamic program behavior with a representative input. Useful for properties that cannot be
  analyzed statically with enough precision.
- Inserting timers into functions.
- Logging major events such as crashes.

Limitations:

- Instrumentation is limited by execution coverage. If a path is never executed, instrumentation for that path collects
  no data. For example, if a word processor is instrumented but the user never prints, instrumentation says nothing
  about the print routines.
- Some instrumentation can dramatically increase execution time, so it may be limited to debugging contexts.

## Backend Monitoring [&uarr;](#building-for-scale)

Backend monitoring lets you view infrastructure performance: HTTP server, middleware, database, third-party APIs, and
more.

It helps you detect problems quickly. Components can fail due to:

- software performance issues
- memory issues
- code bugs
- system-level problems (OS issues, security problems)
- hardware issues (out of memory, disk full, disk failure, network card failure)

## Frontend Monitoring [&uarr;](#building-for-scale)

Frontend monitoring provides a view of web app performance from a user's perspective, including third-party content.

While backend monitoring alerts you to failures of your own components, frontend monitoring reveals performance
problems not necessarily tied to failures. Examples:

- Content problems (a new image is too heavy, a third-party script is down)
- Browser-compatibility problems (some browsers load much slower)
- Location-based problems (users in some regions see slower performance)
- Network issues (last-mile connectivity is a bottleneck, especially on mobile)

Frontend monitoring matters because it reflects what users experience. If your site loads too slowly or feels broken,
users leave.

Frontend monitoring solutions typically collect data in three ways:

1. RUM - real user monitoring. A JS snippet collects performance data from real users. It is good for trends, but does
   not always pinpoint root causes.
2. Simulated browsers. Automated checks with simulated browsers. Cheap but less accurate than real visits.
3. Real-browser monitoring. Uses real browsers to test a site with specific browser, location, and connection settings.
   This helps you tune performance before users are affected.

## Telemetry [&uarr;](#building-for-scale)

Telemetry automatically collects, transmits, and measures data from remote sources using sensors and other devices. The
collected data is transmitted to a central location for analysis to monitor and control the system.

Telemetry data improves customer experience and helps monitor security, application health, quality, and performance.

Key takeaways:

- Collecting telemetry data is essential for managing IT infrastructure.
- Telemetry is measured through monitoring tools that track everything from server performance to utilization.
- If a breach occurs, holistic monitoring helps determine if data was lost or systems were compromised.
- A telemetry vendor can help build and evolve a comprehensive monitoring strategy.

## Mitigation Strategies [&uarr;](#building-for-scale)

This section is mainly relevant to cloud design patterns for scalable solutions.

### Graceful Degradation [&uarr;](#building-for-scale)

Graceful degradation is a principle that a system should continue functioning even if some components or features are
unavailable. In web development, it means the app should still work if a browser or device lacks certain features.

Graceful degradation is often an alternative to progressive enhancement, which prefers advanced features when
available.

### Throttling [&uarr;](#building-for-scale)

Throttling limits the rate at which a system or component can be used. In cloud environments it helps prevent resource
overuse such as compute, bandwidth, or storage.

Ways to implement throttling:

- Rate limiting: cap requests per time period.
- Resource allocation: allocate a fixed resource budget and limit usage once exceeded.
- Token bucket: represent resources as tokens; each request consumes tokens. When empty, requests wait.

Throttling helps keep systems stable and is often combined with auto-scaling and load balancing.

### Backpressure [&uarr;](#building-for-scale)

Backpressure manages data flow when production exceeds consumption. It prevents overload and keeps processing timely.

Ways to implement backpressure:

- Buffering: store incoming data until it can be processed.
- Batching: group data into batches rather than processing one by one.
- Flow control: use signals or windowing to regulate the transmission rate.

Backpressure is often combined with auto-scaling and load balancing.

### Load Shifting [&uarr;](#building-for-scale)

Load shifting balances workload by moving it across resources over time. It helps optimize resource usage.

Ways to implement load shifting:

- Scheduling: run tasks at specific times.
- Load balancing: distribute load across resources.
- Auto-scaling: adjust resource count based on demand.

Load shifting is often combined with throttling and backpressure to build resilient systems.

### Circuit Breaker [&uarr;](#building-for-scale)

The circuit breaker pattern protects a system from failures or excessive load by temporarily stopping operations when
it is in a failed or overloaded state.

A circuit breaker has three states: closed, open, and half-open. In closed, operations proceed. On failure, it moves to
open and blocks operations. After a timeout it moves to half-open and lets a few operations through. If they succeed it
closes; if they fail it opens again.

It is often combined with retries and fallbacks.

## Migration Strategies [&uarr;](#building-for-scale)

https://phauer.com/2015/databases-challenge-continuous-delivery/

Learn how to run database migrations effectively, especially zero-downtime multi-phase schema migrations. Instead of
making all changes at once, do small incremental changes so old and new code can work with the database at the same
time, then remove old code and finally remove unused schema parts.

## Horizontal/Vertical Scaling [&uarr;](#building-for-scale)

Vertical scaling (scale up) increases available resources by using more powerful servers.

Horizontal scaling (scale out) adds more nodes to a server cluster when you run out of CPU, memory, or disk.

Both are infrastructure decisions and apply in different situations as a project grows.

For example, database servers are often the most loaded components. Scaling options depend on the DBMS. Typically this
means relational databases (MySQL, PostgreSQL) or NoSQL (MongoDB, Cassandra, etc).

Horizontal scaling for database servers under heavy load is usually cheaper.

A web project often starts on a single server. When resources run out, there are two options:

- Move the DB to a more powerful server.
- Add another mid-range server and build a cluster.

MySQL is the most popular RDBMS and, like others, needs significant server resources under load. Scaling is mostly
vertical. Sharding exists but requires code changes and can be complex to operate. Replication can also be hard to
maintain.

Vertical scaling

NoSQL scales more easily. With MongoDB, vertical scaling is often more cost-effective and does not require heavy
configuration. Sharding is automatic.

Thus with MySQL you often need a server with more CPU and RAM, which is expensive.

Horizontal scaling

With MongoDB you can add another mid-range server and gain stability and fault tolerance.

Scale-out is a normal stage of infrastructure evolution. Any server has limits, and when they are hit or a bigger
server is too expensive, you add machines and distribute load. This also improves fault tolerance.

Start adding mid-range servers and clustering when a single machine cannot be scaled further or when bigger hardware is
not cost-effective.

The database example is common, but frontend and backend servers also scale.

## Observability [&uarr;](#building-for-scale)

In software development, observability is how well we can understand a system from the work it does, and how to make it
better.

A system is observable if it can produce and collect metrics, logs, and traces so we can understand what happens under
the hood and identify issues and bottlenecks faster.

You can build this yourself, but many tools help, such as Datadog, Sentry, and CloudWatch.

## PHP Performance Boosting Techniques [&uarr;](#building-for-scale)

### Why optimize

The simplest performance fix is to add hardware. If your code runs on one server, adding another doubles cluster
capacity. If you compare this cost to developer time, you have to ask: can a developer deliver a 2x improvement through
optimization in the same time? Maybe. It depends on how optimized the system already is and how strong the developer is.
Hardware, however, remains company property; time does not.

So at small scale, adding hardware is often the right answer.

### Capacity planning

Before doing anything, confirm there is a problem. If there is no problem, try to predict when it might appear. This is
capacity planning.

The most reliable indicator of performance issues is response time. It does not matter if CPU is at 6% or 146% if the
client gets the required service quality in acceptable time.

When a project grows, improve architecture through software tuning and scaling - vertical or horizontal. Tuning is
especially relevant for MySQL.

- Vertical scaling: increase resources.
- Horizontal scaling: move part of the project to separate servers.

### Data caching

There are two main types:

1) PHP opcode cache. The PHP interpreter reads files, generates bytecode, executes, and returns results. This is costly.
   Opcode caching stores compiled scripts so the server does not compile on each request. Compiled scripts live in RAM
   on the server where they were compiled. This allows the server to handle many more concurrent requests.

2) Data cache. Data cache stores copies of data, templates, and other frequently requested files. It can be local to one
   server or distributed across multiple servers.

For Linux servers, PHP OPcache is common. For Windows and Windows Server, there is an alternative called Windows Cache
Extension.

### OPcache

OPcache is an opcode cache. It is a powerful PHP extension for performance. It stores precompiled bytecode in shared
memory so PHP does not need to load and parse scripts on each request. OPcache has three cache levels: shared memory
cache, file cache, and a preload feature added in PHP 7.4. OPcache also applies bytecode optimizations to speed up PHP.

### Redis

Redis is a modern in-memory cache that can be used for distributed caching or local caching for transaction locks. It
ensures cached objects stay available as long as needed. Many users note that it can be complex to configure, but it is
one of the best caching solutions today.

### Additional factors that improve PHP performance

1. Use built-in PHP functions. Prefer built-ins over custom functions.
2. Use JSON instead of XML. `json_encode()` and `json_decode()` are very fast. If you must handle XML, use template
   regexes instead of DOM manipulation.
3. Use caching. Bytecode caching with APC or OPcache saves execution time. Store sessions in Memcached; file-based
   storage does not scale. Memcached works via `memcache` and `memcached` extensions.
4. Remove redundant computations. If a value is used often, compute it once and store in a variable.
5. Use `isset()`. Comparisons with `count()`, `strlen()`, `sizeof()`, and `isset()` are fast ways to check for nonzero
   values.
6. Disable unnecessary classes. If classes or methods are not reused, remove them. If you must use classes, prefer
   derived class methods; they are faster than base class methods.
7. Disable debug output. Error messages are useful during development but slow down production. Turn them off.
8. Close DB connections. Free variables and close DB connections to save memory.
9. Reduce DB calls. Combine queries to reduce the number of DB round trips.
10. Use string functions. `str_replace` is faster than `preg_replace`, and `strtr` is about four times faster than
    `str_replace`.
11. Use single quotes when possible. Double quotes are parsed for variables and are slower.
12. Use strict comparison `===`. It is faster because it checks type as well.
13. Declare variables before loops.
14. Do not call functions in loop headers (for example, `for ($i=0; $i<count($array); $i++)` calls `count()` every
    iteration).
15. `switch` is better than many `if` statements.
16. `require` and `include` are better than `require_once` and `include_once` (better caching behavior).
17. Avoid DB queries inside loops.
18. Minimize use of expensive regular expressions. Use `join`, `explode`, and similar functions instead.
19. Use absolute paths in code, for example `include /var/site/css/style.css;` instead of relative paths like
    `include ../style.css;`.
20. Use modern PHP versions. Code on PHP 8.0+ runs 20-30% faster than PHP 5.4 or 5.6.
21. Use appropriate values for `memory_limit`, `max_execution_time`, and `post_max_size` in php.ini.
22. Use FastCGI or PHP-FPM as the process manager; FPM with Nginx gives top performance.
23. Continuously profile code and fix bottlenecks. Use tools like Xdebug.
24. Identify DB delays. Enable slow query logs and analyze them. Reduce repeated or excessive queries.
25. Clean up the filesystem. Avoid storing sessions in files. Watch file stat calls like `file_exists()`, `filesize()`,
    and `filetime()`. Calling them in loops causes performance issues.
26. Control API latency. Many web apps rely on external APIs. Cache API responses or call APIs in the background. Set
    reasonable intervals for API requests and render cached API output when possible.
27. Remove maintenance scripts from the project root or protect them with auth to avoid DDoS.
28. Use prepared statements for DB access. They prevent SQL injection and can improve DB performance.
29. Combine and minify assets. Reduce the number and size of CSS and JS files to reduce HTTP requests.
30. Optimize session storage. File sessions are fine for small apps, but for many concurrent requests use a DB. If Redis
    is available, use it for session storage.
31. Use asynchronous processing. If a request includes heavy operations, run them asynchronously so the user does not
    wait.

Short summary:

1) At small scale, hardware is often cheaper than optimization.
2) Do not optimize without a clear need.
3) If you must optimize, measure; the bottleneck is often not the code.
4) Interpret metrics correctly: behavior is not always linear (hyperthreading, spikes, nonlinear load).
5) Do not guess: profile and interpret results.
6) Changing compression settings, OPcache, or PHP version is often easier than code refactoring.
7) Look wider: client optimizations or better resource usage may help.
