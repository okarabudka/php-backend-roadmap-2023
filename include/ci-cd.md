# CI/CD

#### Links

- [Jenkins - The leading open source automation server, Jenkins provides hundreds of plugins to support building, deploying and automating any project.](https://www.jenkins.io/)
- [GitLab CI/CD](https://docs.gitlab.com/ee/ci/)
- [Something like GitHub Actions, but for GitLab. Set up a project build](https://doka.guide/tools/gitlab-ci-cd/)
- [What is CI (Continuous Integration)](https://habr.com/ru/post/508216/)
- [Build a Jenkins Pipeline: step by step](https://habr.com/ru/post/654483/)
- [Deployment haulers: or automating checks in fintech systems](https://habr.com/ru/company/oleg-bunin/blog/572406/)
- [GitHub Actions: a simple example to get started](https://habr.com/ru/post/711278/)
- [Quickstart for GitHub Actions](https://docs.github.com/ru/actions/quickstart#creating-your-first-workflow)

### CI (Continuous Integration) [&uarr;](#ci-cd)

CI/CD stands for "Continuous Integration/Continuous Delivery". It is a development approach where build, release,
and testing tasks are fully or partially automated. CI/CD practices are often integrated into product team workflows,
but they also work well for solo projects.

There are many tools for building code and delivering it to users. Each has its own strengths and trade-offs.
Common platforms include GitLab CI/CD, Bitbucket Pipelines, Jenkins, Netlify, JetBrains TeamCity, and GitHub Actions.

A high-level view of how a pipeline runs:

    a developer pushes a commit and opens a merge request (or otherwise triggers a pipeline),
    the configuration selects all tasks whose conditions match the current context,
    tasks are grouped into stages,
    stages run in order (all tasks within a stage can run in parallel),
    if any task in a stage fails, the pipeline stops (in most cases),
    if all stages succeed, the pipeline is considered successful.

In short:

    pipeline: a set of tasks organized into stages that can build, test, package, and deploy the code,
    stage: a logical grouping of 1+ tasks,
    job: a unit of work inside the pipeline, defined by a script plus conditions, artifact caching, and more.

When configuring CI/CD, the goal is to define the jobs required to build, test, and publish code and artifacts.

### Deployment [&uarr;](#ci-cd)

Deployment is the process of releasing and running a web application or site in its target environment (server or
hosting). A developer uploads the locally built application into an environment where it becomes available on
the internet.

Popular tooling: Jenkins or GitLab CI.

About DevOps and its practices:

    DevOps, in simple terms, defines the "factory" and the "assembly line".

    One of the DevOps practices is CI/CD/CDP. This practice describes the steps on that assembly line.

    CI (Continuous Integration) is the initial stage: building code and delivering artifacts to a dev environment.

    CD (Continuous Delivery) continues CI by automatically deploying to test environments and running tests.

    CDP (Continuous Deployment) delivers the outcomes of CI and CD directly into production.

Jenkins or GitLab can implement CI/CD/CDP in practice.
