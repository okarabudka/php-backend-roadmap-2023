## Proxy

The Proxy pattern is a structural object-level pattern.

Proxy provides an object that controls access to another object.

Another name is "Surrogate". In that sense, it is an object that replaces another object. It shares some properties
with the original, but not all of them.

Proxy requires that the original object and its surrogate can interact, and that the surrogate can be replaced with the
original at the usage site. Therefore, the interfaces of the original and the surrogate must match.

It is easier to understand if you have seen the movie "Surrogates".

## Example

Required for implementation:

1. ISubject interface as a common interface for the real object and its surrogate.
2. RealSubject class implementing the real object.
3. Proxy class implementing the surrogate object. It keeps a reference to the real object so the proxy can call it
   directly.

For example, Proxy can be used when you need to manage heavyweight objects but do not want to create them until they are
actually needed.

You might think this is the same as Adapter or Decorator, but...

Proxy provides the same interface as the object.
Adapter provides a different interface.
Decorator provides an extended interface.

## Real-world analogy

    A payment card is a proxy for a bundle of cash. Both card and cash share the same interface: you can pay for goods.
    The buyer benefits by not carrying cash, and the shop owner benefits by not having to arrange costly cash collection,
    because money goes directly to the account.

## Applicability

### Lazy initialization (virtual proxy). When you have a heavy object that loads data from a file system or database.

    Instead of loading data right after program start, you can save resources and create the object only when needed.

### Access control (protection proxy). When you have different user types and want to protect an object from unauthorized access. For example, if your objects are a critical part of the OS and users are third-party programs (good or malicious).

    The proxy can check access on each call and forward execution to the service object if access is allowed.

### Local execution of a remote service (remote proxy). When the real service object is on a remote server.

    In this case the surrogate translates client requests into network calls using a protocol understood by the remote
    service.

### Logging requests (logging proxy). When you need to keep a history of requests to the service object.

    The surrogate can save a history of client access to the service object.

### Object caching (smart reference). When you need to cache results of client requests and manage their lifecycle.

    The surrogate can count references to the service object that were returned to the client and remain active. When all
    references are released, you can release the service object as well (for example, close a DB connection).

    In addition, the proxy can track whether the client modified the service object. This allows reuse and saves
    resources, especially for large, expensive services.

## Implementation steps

1. Define the interface that makes the proxy and the original object interchangeable.

2. Create the proxy class. It should contain a reference to the service object. Most often the proxy creates the service
   object itself. In rare cases the proxy receives a ready service object from the client via the constructor.

3. Implement proxy methods depending on its purpose. In most cases, after doing some useful work, proxy methods should
   forward the request to the service object.

4. Consider introducing a factory that decides which object to create: proxy or real service object. Alternatively, this
   logic can be placed in the proxy's creation method.

5. Consider implementing lazy initialization of the service object on the first client call.

## Pros and cons

    + Controls the service object without the client noticing.
    + Works even if the service object is not created yet.
    + Can manage the lifecycle of the service object.

    - Adds complexity due to extra classes.
    - Increases service response time.

## Relations with other patterns

1. Adapter provides an alternative interface. Decorator provides an extended interface. Proxy provides the same
   interface.

2. Facade is similar to Proxy in that it can replace a complex subsystem and initialize it. But unlike Facade, Proxy has
   the same interface as its service object, so they are interchangeable.

3. Decorator and Proxy have similar structures but different purposes. Both are built on composition and delegate work
   to other objects. The difference is that Proxy manages the service object's lifecycle, while Decorator wrapping is
   controlled by the client.
