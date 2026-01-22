# Server-Sent Events

#### Links

- [Asynchronous web, or what WebSockets are](https://tproger.ru/translations/what-are-web-sockets/)
- [Working with WebSockets in PHP](https://habr.com/ru/post/709448/)
- [HTTP requests and AJAX: short polling, long polling, WebSockets, and everything else](https://vk.com/@social_it-http-zaprosy-i-ajax-short-polling-long-polling-websockets-i)

## Short polling, long polling, WebSockets, and server-sent events [&uarr;](#server-sent-events)

A common question is how notifications and chats work in VK or other high-load projects. Notifications arrive instantly,
so if you used plain AJAX, the server would fall over quickly. This note explains the main ways to implement this kind
of functionality.

### Regular HTTP Request [&uarr;](#server-sent-events)

A typical HTTP request flow:

    1. The client sends a request for a web page.
    2. The server builds a response.
    3. The server sends the response to the client.

Communication happens in two stages: request (client pull) and response (server push). This leads to the idea of polling
as frequently as possible to retrieve fresh data.

### Periodic Requests (Polling) [&uarr;](#server-sent-events)

The first obvious approach for continuous updates is polling: periodic requests to the server asking "did anything
change?" For example, once every 10 seconds.

In response, the server marks the client as online and returns all events accumulated up to that point. This is often
implemented with AJAX.

### Short Polling (AJAX) [&uarr;](#server-sent-events)

Flow: request -> response

    Send a request.
    Receive an immediate response.
    Repeat every X seconds/minutes to keep the app up to date (setInterval).

This approach generates many requests. It increases network overhead and server load. The server is busy only while it
handles a request, then becomes free again.

Pros:

    - Simple to implement. The client side is easy, but the server receives a steady stream of requests.

Cons:

    - Extra inbound traffic. Each request carries headers and each response returns headers as well, which can dwarf the
      actual payload.
    - Delay between event and notification, because updates only arrive on the next poll.
    - The server must keep events until the client fetches them or they expire. A caching layer (like Varnish) can help,
      but requires more memory.

### Long Polling [&uarr;](#server-sent-events)

Flow: request -> wait -> response

    1. Send a request to the server.
    2. The connection stays open until a message appears.
    3. When a message appears, the server responds with data.
    4. The browser immediately sends a new request.

This is an improved version of short polling. The client sends a request, and the server keeps the connection open
until data arrives or the client disconnects. When data arrives, the server responds and closes the connection; the
cycle repeats.

Compared to short polling, long polling uses CPU time continuously while a thread stays open, so server resources must
be planned accordingly.

Pros:

    - Minimal number of requests.
    - Near real-time delivery.

Cons:

    - Higher server resource consumption, especially with large payloads.

### Use Cases [&uarr;](#server-sent-events)

Polling works well when messages are rare.

When there are many frequent messages (many users, many dialogs), request/response traffic grows sharply. Each message
adds another request and extra header overhead.

In these cases, continuous connections are more efficient.

### WebSockets [&uarr;](#server-sent-events)

Flow: client <-> server

WebSockets is a binary full-duplex protocol that allows client and server to communicate symmetrically. Typical flow:

    1. Send a request to the server.
    2. The page runs JS and opens a connection.
    3. The server and client can send messages when new data is available.

A TCP connection is opened and kept alive as long as needed. The server or client can close it at any time.
During the handshake, the client sends special headers that are base64-encoded. If the server accepts the connection, it
returns the Accept header. The client handshake always includes an Origin header, which the server can use to decide
whether to accept requests from different sources.

After the connection is established, both sides can send messages at any time. This is efficient for applications that
require frequent two-way data exchange, such as games, chats, and real-time dashboards.

Pros compared to polling:

    - One persistent connection.
    - High timing precision for events.
    - Browser handles network recovery.

Cons:

    - Not compatible with HTTP; requires a separate server and complicates debugging.
    - Not supported by Opera Mini and some older browsers.

### Server-Sent Events (SSE) [&uarr;](#server-sent-events)

Server-Sent Events is a modern standard that lets the browser create an EventSource object, which manages the
connection, reconnects on failure, and emits events when data arrives.

The client sends a request, and the server responds with the following header:

    Content-Type: text/event-stream

The connection stays open. To send data, the server writes to the socket in this format:

    data: My message\n\n

To send multiple lines of data:

    data: {\n
    data: "msg": "hello world",\n
    data: "id": 12345\n
    data: }\n\n

SSE is different from WebSockets: WebSockets can send data both ways (client <-> server), while SSE is one-way (client
<- server).

SSE is simpler to implement, works over HTTP, and includes some features that must be implemented manually with
WebSockets.

It is a good choice when you primarily need one-way data flow from server to browser.
