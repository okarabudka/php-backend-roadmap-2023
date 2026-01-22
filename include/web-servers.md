# Web Servers

#### Links

- [Web server](https://doka.guide/tools/web-server/)
- [Apache web server](https://doka.guide/tools/apache-web-server/)
- [Nginx web server](https://doka.guide/tools/nginx-web-server/)
- [Apache vs Nginx: a practical view](https://habr.com/ru/post/267721/)
- [Threads, processes, modules](http://algolist.ru/web/servers.php)

## Server Software [&uarr;](#web-servers)

Web servers include Apache and Nginx. A web server is a program that accepts user requests, processes them, and sends
responses back over the application-layer HTTP protocol.

A programming language interpreter.

DBMS - database management systems: MySQL, PostgreSQL, MS SQL, Oracle, Redis, MongoDB, and so on.

Search engines - Elasticsearch / Sphinx - allow search and filtering faster than in relational DBMS. Kibana visualizes
Elasticsearch data as part of the Elasticsearch, Logstash, and Kibana stack (ELK Stack). Sphinx is a full-text search
engine.

Elasticsearch (ES) is a scalable search engine that can also be considered a non-relational (NoSQL) database. It is
mostly used for full-text search with filters and analyzers.

Caching servers are systems that store results of request processing and reuse them on repeated requests to speed up
page generation. Examples: Memcached and Redis.

Backup software - backups must be created regularly and automatically, and stored on a separate server from production
systems.

Code accelerators speed up program execution. Common PHP accelerators include APC, eAccelerator, and XCache.

Monitoring and alerting are systems that collect key performance metrics and report problems.

## Nginx [&uarr;](#web-servers)

Nginx was designed specifically to address Apache performance limitations. Nginx performance and scalability are due to
its event-driven architecture, which is very different from Apache. In Nginx, each worker process can handle thousands
of HTTP connections simultaneously. As a result, Nginx is a lightweight, scalable, high-performance implementation. This
architecture makes handling large and fluctuating loads more predictable in terms of RAM usage, CPU usage, and latency.

Nginx also has a rich feature set and can perform different server roles:

- reverse proxy server for HTTP, HTTPS, SMTP, POP3, and IMAP
- load balancer and HTTP cache
- front proxy for Apache and other web servers, combining Apache flexibility with Nginx performance for static content

## Apache [&uarr;](#web-servers)

Apache is free software for hosting a web server. It performs well on large projects.

mod_rewrite is an Apache module for rewriting URLs. It uses rules that can be defined in the server configuration
(httpd.conf) or in .htaccess files inside your site structure. Rules are defined using regular expressions.

Apache was designed to deliver web content accessed over the internet. It is known for its key role in the early growth
of the internet. Apache is open-source software developed and maintained by a community and runs on many operating
systems. The architecture includes the Apache core and modules. The core provides basic server functionality, so it
accepts connections and manages concurrency. Modules implement request-specific functionality. A particular Apache
deployment can be configured to include various modules such as security features, dynamic content processing, or basic
HTTP request handling.

The "one server does everything" model was key to Apache's early success. However, as traffic and the number of web
pages grew and performance constraints appeared, tuning Apache for real-world traffic became more complex.

## Apache vs Nginx: comparing their feature sets [&uarr;](#web-servers)

### Simplicity

Building and updating applications on Apache is very straightforward. The "one connection per process" model makes it
very easy to insert modules at any point in the web serving logic. Developers can add code so that if it fails, only the
worker process running that code is affected. All other connections continue without interruption.

Nginx, on the other hand, has a more complex architecture, so module development is not as easy. Nginx module
developers must be careful to create efficient, accurate code without failures, and integrate it with the event-driven
core to avoid blocking operations.

### Performance

Performance is measured by how the server delivers large volumes of content to the client browser. Content can be
static or dynamic. Let's look at the numbers for static content.

Nginx is about 2.5 times faster than Apache according to a performance test with up to 1000 concurrent connections.
Another test with 512 concurrent connections showed that Nginx is roughly twice as fast and uses less memory. Nginx has
a clear advantage for static content. If you need to serve concurrent static content, Nginx is often the preferred
choice.

### Dynamic content

Speedemy tests show that for dynamic content, Apache and Nginx performance is the same. The likely reason is that most
request processing time is spent in the PHP runtime rather than the core web server. The PHP runtime is quite similar
for both web servers.

Apache can handle dynamic content by embedding a language processor such as PHP in each of its worker instances. This
lets it execute dynamic content directly on the web server without relying on external components. These dynamic
processors can be enabled via dynamically loaded modules.

Nginx does not handle dynamic content natively. To process PHP and other dynamic requests, Nginx must pass the request
to an external processor and wait for the rendered content. However, this method has advantages: because the dynamic
interpreter is not built into the worker process, its overhead applies only to dynamic content.

### OS support

Apache runs on UNIX, Linux, and BSD systems and fully supports Microsoft Windows. Nginx also runs on several modern
Unix-like systems and supports Windows, but its Windows performance is not as stable as on UNIX platforms.

### Security

Both Apache and Nginx are secure web servers. The Apache Security Team provides support and coordinates vulnerability
handling. It is important to configure servers correctly and understand what each setting does.

### Flexibility

Web servers can be extended with modules. Apache has long supported dynamic modules, so all Apache modules can be
loaded dynamically.

Nginx Plus (a load balancer, web server, and content cache built on Nginx open source) also uses a modular
architecture. New features can be added via software modules that can be loaded into a running Nginx Plus instance on
demand. Dynamic modules add features such as IP geolocation, image resizing, and Lua scripts in the Nginx Plus event
processing model. Modules are created both by Nginx, Inc. and by third-party developers.

Most of the required core functionality (for example, proxying, caching, and load distribution) is supported by both
web servers.

### Support and documentation

Available help and support matter. Because Apache has been popular for so long, support is widespread. There is a large
library of first- and third-party documentation for core Apache and task-focused scenarios involving Apache integration
with other software.

Along with documentation, many tools and web projects include bootstrap tooling for Apache environments. This can be
built into the projects themselves or packaged by your distribution maintainers.

Apache typically receives strong third-party support simply because of its market share and longevity.

In the past, comprehensive English-language documentation for Nginx was hard to find because much of its early
development and documentation was in Russian. Today, documentation is solid, and the Nginx site has many resources for
administration and third-party documentation.

### Nginx and Apache working together

For many applications, Nginx and Apache complement each other well. A common deployment pattern is to run Nginx open
source software as a proxy server (or Nginx Plus as an application delivery platform) in front of an Apache-based web
application. Nginx does the heavy HTTP work - serving static files, caching content, and offloading slow HTTP
connections - so Apache can run application code in a safe environment.

## Load balancing for application servers (HAProxy) [&uarr;](#web-servers)

HAProxy, or High Availability Proxy, is a TCP/HTTP load balancer. It distributes workload across servers to maximize
performance and optimize resource usage. HAProxy supports flexible health checks, failover handling, and recovery.

HAProxy is installed on a separate server that receives client requests and forwards them to Nginx web servers.
