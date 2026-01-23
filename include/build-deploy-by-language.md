# Build and Deploy by Language

A quick map from source code to production.

## Go

- Build: `go build` for static binaries.
- Deploy: copy binary + config, run with systemd or container.
- Common: use `-ldflags` for versioning, use multi-stage Docker builds.

## PHP

- Build: Composer install, autoload, optimize.
- Deploy: upload code + vendor, configure PHP-FPM + web server.
- Common: opcache, environment config, zero-downtime reloads.

## Python

- Build: virtualenv/poetry, package wheels if needed.
- Deploy: gunicorn/uvicorn + systemd or container.
- Common: pin dependencies, manage migrations.

## Node.js

- Build: npm install, build assets if needed.
- Deploy: pm2/systemd or container.
- Common: use environment variables, health checks.
