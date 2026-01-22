## Chain of Responsibility

The Chain of Responsibility pattern is a behavioral pattern at the object level.

Chain of Responsibility avoids coupling the sender of a request to its receiver, while giving multiple objects a
chance to handle the request. Receivers are linked into a chain, and the request is passed along the chain until some
object handles it.

In essence this is a chain of handlers that receive a request in turn and then decide whether to handle it. If the
request is not handled, it is passed further along the chain. If it is handled, the pattern decides whether to pass it
on or not. If no handler processes the request, it is simply lost.

## Example

Required for implementation:

1. Base abstract Handler class that defines the handler interface in the chain.
2. ConcreteHandlerA class that implements handler A.
3. ConcreteHandlerB class that implements handler B.
4. ConcreteHandlerC class that implements handler C.

Note that instead of storing references to all candidate receivers, each sender keeps a single reference to the start
of the chain, and each receiver has a single reference to its successor, the next element in the chain.

## Real-world examples

    - A logging framework where each chain element decides what to do with a log message.

    - Spam filtering.

    - Caching: the first object is an instance of something like a Memcached interface. If the cache miss occurs, the
      call is delegated to the database interface.

## Applicability

### When a program must handle various requests in different ways, but it is not known in advance which requests will come and which handlers are needed.

    With Chain of Responsibility you can link potential handlers into a chain and, upon receiving a request, ask each
    in turn whether it wants to handle the request.

### When it is important that handlers run one after another in a strict order.

    Chain of Responsibility lets you run handlers sequentially in the order they appear in the chain.

### When the set of objects that can handle a request must be defined dynamically.

    At any moment you can rewire the chain to remove or add a link.

## Implementation steps

1. Create the handler interface and define the main handling method.

Think about how the client should pass request data to the handler. The most flexible approach is to turn the request
into an object and pass it through handler method parameters.

2. It makes sense to create an abstract base handler class to avoid duplicating the next-handler plumbing in every
   concrete handler.

Add a field in the base handler to store a reference to the next object in the chain. Set it via the constructor. This
makes handler objects immutable. But if the program expects dynamic chain rewiring, you can also add a setter.

Implement the base handling method so it forwards the request to the next object if it exists. This hides the
next-reference from subclasses while still letting them pass requests further down the chain via the parent method.

3. One by one create concrete handler classes and implement request handling. On receiving a request, each handler must
   decide:
   Can it handle the request or not?
   Should it pass the request to the next handler or not?

4. The client can build the handler chain itself based on business logic, or obtain ready-made chains from elsewhere. In
   the latter case chains are built by factory objects based on application configuration or environment parameters.

5. The client can send requests to any handler in the chain, not just the first. The request will travel along the
   chain until a handler refuses to pass it further or the end of the chain is reached.

6. The client must be aware of the chain's dynamic nature and be prepared for these cases:
   The chain may consist of a single object.
   Requests may not reach the end of the chain.
   Requests may reach the end but remain unhandled.

## Pros and cons

    + Reduces coupling between client and handlers.
    + Follows the single responsibility principle.
    + Follows the open/closed principle.

    - A request can end up unhandled.

## Relations with other patterns

1. Chain of Responsibility, Command, Mediator, and Observer show different ways of working with request senders and
   receivers:
    - Chain of Responsibility passes a request through a chain of potential receivers until one handles it.
    - Command sets up an indirect one-way connection from senders to receivers.
    - Mediator removes direct connections between senders and receivers, making them communicate through itself.
    - Observer broadcasts a request to all interested receivers while allowing them to subscribe or unsubscribe.

2. Chain of Responsibility is often used together with Composite. In that case the request is passed from child
   components to their parents.

3. Handlers in Chain of Responsibility can be implemented as Commands. In that case many different operations can be
   performed on the same context, which is the request.

Another approach is when the request itself is a Command sent through a chain of objects. In that case the same
operation can be performed on many different contexts represented as a chain.

5. Chain of Responsibility and Decorator have very similar structures. Both are based on the idea of recursively
   executing an operation through a series of linked objects, but there are important differences.

Handlers in Chain of Responsibility can perform arbitrary actions independent of each other and can stop the chain at
any time. Decorators, on the other hand, extend a specific action without breaking the base operation interface and
without stopping the rest of the decorators.
