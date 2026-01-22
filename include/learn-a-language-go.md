# Go (Golang)

#### Links

- [A Tour of Go](https://go.dev/tour/welcome/1)
- [Go for PHP developers](https://pahanini.gitbooks.io/golang-for-php-developers/content/)
- [Effective Go](https://go.dev/doc/effective_go)
- [The Go Programming Language Specification](https://go.dev/ref/spec)
- [Golang for web development: usage examples](https://proglib.io/p/golang-dlya-veb-razrabotki-primery-ispolzovaniya-2021-04-20)
- [Go from a PHP programmer's point of view](https://habr.com/ru/post/277987/)

Go (Golang) is a compiled, concurrent programming language from Google with open source. It is a general-purpose
language, but its main use is building web services and client-server applications.

Go draws on features from C, C++, Python, Pascal, Oberon, and Modula.

## Advantages

- Simplicity. A simplified syntax reduces learning time and increases development speed. This matters in large
  organizations with hundreds of developers.
- Fast compilation.
- Good versioning and free updates.
- Rich standard library. Many things are easy to build with Go, and you can also integrate C libraries effectively.

## Disadvantages

- Fewer job openings. Demand for Go developers is relatively low, and junior roles are scarce.
- Enforced formatting. This is controversial: it can be a downside, but it ensures consistent style.
- Simplified syntax can be limiting. The language enforces one correct way, so personal style is harder to preserve.

## What Go is used for

Go was initially created for networking and infrastructure as a replacement for high-performance server languages like
Java and C++. Today it is used for many backend scenarios:

- Cloud and server applications, web services
- DevOps and process automation
- Command-line tools
- AI and big data
- Microcontrollers and robotics

Go is especially strong for infrastructure. The most popular tools in this area are written in Go: Kubernetes, Docker,
and Prometheus.

## Language features

### Compilation

Source code is compiled to machine code. The official Go compiler runs on UNIX-like systems including macOS, Linux, and
Windows. On mobile, Go supports Android. There are also third-party compilers.

### Concurrency

Built-in concurrency makes it easier to write high-performance software. Go provides goroutines and channels.

### Strong static typing

Variable types are declared explicitly (string, number, etc). A variable can only hold values of its declared type.
Unused variables are compile errors. Explicit types make it easier to compose large systems.

### Simple and readable syntax

Go has no classes or inheritance, which keeps code simple. It is accessible to beginners. The official Go guide is
about 50 pages, easy to read, and full of examples.

Simplified syntax also makes reading others' code easy. Clear left-to-right flow matters in teams.

Example:

    package main
    import "fmt"
    func main() {
        fmt.Println("hello world")
    }

### Developer tools

Go ships with tools that speed up development:

- `typecheck` verifies type correctness
- `gas` finds vulnerabilities
- `go vet` detects common mistakes
- `gofmt` formats code with correct spacing and indentation
- `godoc` extracts comments into documentation

Go also includes `pprof` for profiling. It shows slow code, CPU load, and memory usage. Output is text reports and
profiles. It requires `graphviz` for visualization.

### Garbage collection

The garbage collector scans code, finds objects that slow it down, and removes them. This improves speed and resource
usage. Some languages (like C++) require manual memory management.

### Cross-platform support

Go runs on Windows, Linux, macOS, Android, and several UNIX systems like FreeBSD and OpenBSD. Code is portable: programs
can be recompiled for other OSes.

### Limited OOP constructs

Go does not support all OOP features. For example, it has no classes or inheritance. This is intentional to simplify
code and reduce redundancy for higher performance.

### Full Unicode support

Unicode is the most complete character encoding. Many languages require enabling it, but in Go strings are Unicode by
default.
