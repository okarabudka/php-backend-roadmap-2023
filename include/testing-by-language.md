# Testing by Language

Pick a small, consistent testing stack per language.

## Go

- Standard `testing` package.
- Table-driven tests.
- Use `testcontainers` for integration tests.

## PHP

- PHPUnit for unit and integration tests.
- Use fixtures and factories for data setup.
- Mock external services with HTTP stubs.

## Python

- pytest for testing.
- Use fixtures for setup and teardown.
- Use `responses` or `httpx` mocks for APIs.

## Node.js

- jest or vitest.
- Use msw or nock for HTTP mocks.
