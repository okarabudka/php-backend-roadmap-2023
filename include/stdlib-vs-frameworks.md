# Stdlib vs Frameworks

Decide when the standard library is enough and when a framework is justified.

## Use stdlib when

- The service is small and focused.
- You need full control over dependencies.
- Startup time and memory are critical.

## Use a framework when

- You need routing, auth, ORM, and validation quickly.
- The team expects shared conventions.
- You need built-in security defaults.

## Go

- Stdlib: `net/http`, `database/sql`.
- Frameworks: chi, gin, echo, fiber.

## PHP

- Stdlib: minimal, usually with Composer packages.
- Frameworks: Laravel, Symfony, Slim.

## Python

- Stdlib: `http.server`, `sqlite3` for small tools.
- Frameworks: Django, FastAPI, Flask.

## Node.js

- Stdlib: `http`, `fs` for tiny services.
- Frameworks: Express, NestJS, Fastify.
