# Containerization vs Virtualization

#### Links

- [Deploying an image to Docker Hub](https://kramarenko.com.ua/post/deploying_image_to_docker_hub)
- [Harbor - a Docker registry with security out of the box](https://habr.com/ru/company/flant/blog/419727/)
- [Learning Docker, part 1: basics](https://habr.com/ru/company/ruvds/blog/438796/)
- [Learning Docker, part 2: terms and concepts](https://habr.com/ru/company/ruvds/blog/439978/)
- [Learning Docker, part 3: Dockerfile files](https://habr.com/ru/company/ruvds/blog/439980/)
- [Learning Docker, part 4: shrinking images and speeding up builds](https://habr.com/ru/company/ruvds/blog/440658/)
- [Learning Docker, part 5: commands](https://habr.com/ru/company/ruvds/blog/440660/)
- [Learning Docker, part 6: working with data](https://habr.com/ru/company/ruvds/blog/441574/)
- [Dockerfile Instructions](https://kapeli.com/cheat_sheets/Dockerfile.docset/Contents/Resources/Documents/index)
- [Kubernetes basics](https://habr.com/ru/post/258443/)
- [LXC container for web development as an alternative to Docker](https://habr.com/ru/post/563040/)

## Docker [&uarr;](#containerization-vs-virtualization)

Docker is a technology that lets you build and run applications in a portable environment. The idea is simple: if it
works on your machine, it should work everywhere. To achieve that, you package the environment along with the app.

Docker is most often used for deploying server applications, but it is also used in frontend workflows.

Docker Compose is a tool for running a multi-container application that is platform-independent and contains all
required technologies and libraries. The app configuration is stored in a single YAML file and is started with one
command.

Top-level keys in compose.yaml:

- version (deprecated soon): config file format version
- services (required): list of containers to run
- networks: Docker Network subnets that connect groups of containers in a virtual LAN (can be exposed)
- volumes: volumes available to containers
- configs: parameters that let you run containers in different modes without rebuilding
- secrets: security-sensitive parameters (like configs, but for secrets)

A typical container lifecycle:

- Create container
- Run container
- Pause container
- Resume container
- Start container
- Stop container
- Restart container
- Force stop container
- Remove container

### Important services

Docker Engine is the application that manages Docker objects. It includes three components:

- API interface (Docker API)
- CLI client (Docker CLI). You run commands that start with `docker`. The client uses the Docker API to send requests to
  the daemon.
- Server (Docker Daemon). The daemon listens to the Docker API. It manages images, containers, networks, and volumes.

Your machine is the Docker Host. All operations you perform via the UI or CLI are executed by the daemon through the
engine API.

Docker Desktop is a GUI bundle that includes a VM for the engine, a dashboard, CLI client, Docker Hub registry tools,
and more.

### Docker objects

- Image (Docker Image). A prototype of a future container that includes the OS, app, or build project. Images are built
  in layers. Each new layer extends the previous one. Layers build on top of a base image, forming a new image. For
  example, a base OS image.
- Container (Docker Container). A built and running application in an isolated environment based on an image. Each new
  layer extends the previous one, forming a stack of tools, platforms, and system services. The container filesystem is
  also layered (Union File Systems). Files and directories from different layers overlay into one view.
- Volume (Docker Volume). A directory that can be mounted into containers. It can map to a local folder or be a
  container-only volume. Volumes store configuration files, security-critical data, databases, and other files that must
  survive container teardown.
- Network (Docker Network). A virtual LAN that lets multiple containers communicate and connect a container to your
  computer. The main modes:
  - bridge: containers can talk to each other (web server + DB)
  - host: share the host network
  - none: networking disabled

### Tools

Docker Hub (registry) is the official image registry. Published images live there. Other public registries include:

- Google Cloud Container Registry
- Azure Container Registry
- IBM Cloud Container Registry
- Oracle Cloud Infrastructure Container Registry
- Yandex Container Registry

Docker repository

A Docker Repository is a set of Docker images with the same name and different tags. Tags identify images. Repositories
usually contain multiple versions of the same image. For example, `python` is a popular official repository name. The
image `python:3.7-slim` is a tag in that repository. You can push a whole repository or a single image.

Docker CLI is a command-line client used to manage Docker.

Common commands:

- `docker ps`
- `docker run`
- `docker image`
- `docker container`
- `docker volume`

### How to use

Docker CLI flags are similar to bash commands. For example, `prune` removes unused objects. `rm` removes items, `ls`
lists them. Docker objects must have unique names. If you do not name an object, Docker generates a name using a hash.
If you try to create an object of the same type with a name that is already used, Docker will reject it.

### Monitoring running containers

- `docker ps` lists running containers.
- `docker ps -a` lists both running and stopped containers.
- `docker ps -s` shows disk usage per running container.
- `docker ps -f name=hello` filters by name, for example `hello`.

### Running containers

To run a container that exists locally or on Docker Hub:

    docker run --name test -i -t hello
    or
    docker exec -it container_name bash

`--name` sets the container name. `-i` and `-t` tell Docker to allocate stdin and a TTY. To mount a volume that maps to
your local folder and get shell access to the container:

    docker run -t -i --mount type=bind,src=/data,dst=/data hello bash

### Managing images

List local images:

    docker image ls

Flags `prune` and `rm` work as usual and remove unused or specific images. For registries:

- `docker image pull hello` downloads image `hello` from a registry
- `docker image push hello` uploads image `hello` to a registry
- `docker image inspect hello` shows full info about image `hello`
- `docker image build` builds an image from the current folder with a Dockerfile

### Periodic cleanup

    docker container prune
    docker image prune
    docker volume prune
    docker network prune

### Download all images from a registry

    docker pull docker.ru/php/php-apache -a
    docker pull docker.ru/php/php-fpm -a

### Managing volumes

- `docker volume ls` lists all volumes
- `docker volume ls -f name=hello` filters by name, for example `hello`
- `docker volume create hello` creates a new volume
- `docker volume inspect hello` shows full volume info

### Docker images

A Docker container is a Docker image brought to life. It is a self-contained OS with only the essentials and the app
code.

Docker images are the result of a build process, and containers are running images. Dockerfile files tell Docker how to
build images. Instructions are processed top-to-bottom.

When you run `docker build` to create a new image, Docker expects the Dockerfile to be in the current working
directory.

Only the instructions `FROM`, `RUN`, `COPY`, and `ADD` create layers. Other instructions configure metadata or tell
Docker what to do when the container runs, such as opening a port or executing a command.

A dozen Dockerfile instructions:

- FROM - sets the base (parent) image
- LABEL - describes metadata, for example who created and maintains the image
- ENV - sets environment variables
- RUN - executes a command and creates an image layer, often for installing packages
- COPY - copies files and directories into the container
- ADD - copies files and directories, can unpack local .tar files
- CMD - the command with arguments to run when the container starts (can be overridden)
- WORKDIR - sets the working directory for the next instruction
- ARG - defines build-time variables
- ENTRYPOINT - provides the command to run during container execution (not overridden)
- EXPOSE - declares a port to be opened
- VOLUME - creates a mount point for persistent storage

### .dockerignore

Using a .dockerignore file helps:

1) Exclude secrets like logins and passwords from the image.
2) Reduce image size, making builds and pulls faster.
3) Reduce cache invalidations when rebuilding similar images.

Tips for efficient Docker caching:

1) Use official base images when possible. They are updated regularly and are safer.
2) For smaller images, prefer base images built on Alpine Linux.
3) If you use apt, combine `apt-get update` and `apt-get install` in one RUN. Also group installs in one RUN and list
   packages alphabetically over multiple lines with `\`, for example:

    RUN apt-get update && apt-get install -y \
        package-one \
        package-two \
        package-three \
    && rm -rf /var/lib/apt/lists/*

   This reduces the number of layers and keeps the Dockerfile clean.

4) Add `&& rm -rf /var/lib/apt/lists/*` at the end of RUN commands that install packages to avoid caching apt data in
   image layers.
5) Use caching wisely by placing frequently changing commands near the end of the Dockerfile.
6) Use .dockerignore.
7) Check out `dive`, a tool for inspecting Docker images and reducing image size.

### Building images

Build images with:

    docker image build -t my_repo/my_image:my_tag .

The `-t` flag (short for `--tag`) assigns a tag to the image, here `my_tag`. The dot at the end tells Docker to build
using the Dockerfile in the current directory.

After the image is built, you can push it to a remote registry. For example, for Docker Hub:

    docker login

Then push:

    docker image push my_repo/my_image:my_tag

## Kubernetes [&uarr;](#containerization-vs-virtualization)

Kubernetes is an open-source system for container orchestration. It lets you create, update, and scale containers
without worrying about downtime.

For a PHP app, Nginx is a reverse proxy for PHP-FPM. Containerizing both in a single container can be cumbersome, but
Kubernetes helps manage both services in separate containers. You can reuse containers and switch between them without
rebuilding images for each new version of Nginx or PHP.

If you use Docker containers, you then need to scale and run them across many hosts and load-balance them. Kubernetes
provides a high-level API that groups containers, defines pools, balances load, and controls placement.

## LXC [&uarr;](#containerization-vs-virtualization)

An LXC container for web development is an alternative to Docker.

### Differences between LXC and Docker

- Docker is a container for packaging a single process or service. In practice Docker is a set of lightweight
  containers that package a single web service.
- LXC is a lightweight container for one web service or site, including all services needed for it to function.

### When LXC is convenient

- Legacy: you already have a web service or site on a dedicated server and want to package it in a container to share
  with developers or move to another server (backup or staging).
- You like working in an environment where all services are in a single container.
- You need isolation so each web service runs in its own container without the performance cost of VMs.
- If you can configure core Linux services, you can build an LXC container for your project. LXC is close to a regular
  VM.

### LXC summary

- Low entry barrier: create a container in minutes.
- Great for packaging existing projects and legacy systems.
- Useful when you need to check someone else's web project or install specific versions of MySQL/Nginx without touching
  the main system.
- Lightweight, saves time on debugging and setup.
- Works with sudo; unprivileged containers are supported too.
- Works great with ZFS, giving instant snapshots and extra reliability.

### When Docker can be better

- You need IaC. Dockerfile is an industry standard. LXC has no equivalent. The Infrastructure as Code approach is close
  to me; I tried a shell script similar to a Dockerfile to reproduce a LAMP environment on LXC, but you cannot update
  production in one command with a script.
- You need a public image for a program or want to publish your own image.

Infrastructure as Code (IaC) is an approach to managing and describing data center infrastructure via configuration
files instead of manual edits on servers or interactive actions.

IaC is popular in cloud computing (IaaS). The main idea is to describe infrastructure as code and reuse software
engineering practices. IaC code can be declarative (more common) or imperative.
