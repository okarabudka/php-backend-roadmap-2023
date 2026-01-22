# Testing

#### Links

- [Software testing theory in simple terms](https://habr.com/ru/articles/587620/)
- [What is TDD and BDD, and what you should know about them](https://medium.com/@lucyhackwrench/%D1%87%D1%82%D0%BE-%D1%82%D0%B0%D0%BA%D0%BE%D0%B5-tdd-%D0%B8-bdd-%D0%BD%D0%B0-%D0%BF%D0%B0%D0%BB%D1%8C%D1%86%D0%B0%D1%85-%D0%B8-%D1%87%D1%82%D0%BE-%D0%B4%D0%BE%D0%BB%D0%B6%D0%B5%D0%BD-%D0%B7%D0%BD%D0%B0%D1%82%D1%8C-%D0%BE-%D0%BD%D0%B8%D1%85-%D1%84%D1%80%D0%BE%D0%BD%D1%82%D0%B5%D0%BD%D0%B4%D0%B5%D1%80-701a10e06bb9)

It is important to distinguish between automated testing and manual testing. Manual testing is performed by a person
who checks application functionality by interacting with the software and its APIs. It is expensive because someone
must set up the environment and run the tests. There is also a human factor: a tester can make a typo or miss a step in
a test script.

Automated tests are executed by a machine using pre-written test scripts. They can range from checking a single method
in a class to simulating complex UI flows that must always produce the same results. This approach is more stable and
reliable than manual testing, but the quality of automation depends on the quality of the test scripts.

#### Types of tests

- Unit testing
- Integration testing
- System testing

#### Methodologies

- Test-Driven Development (TDD)
- Behavior-Driven Development (BDD)

Both are approaches where you write tests first and then implement code.

"*DD" stands for "*something*-driven development".

TDD (Test-Driven Development) focuses on tests.

BDD (Behavior-Driven Development) focuses on behavior.

BDD is an extension of the TDD approach. They serve different goals and use different tools. Different teams interpret
these terms differently, which often leads to confusion.

- TDD is a good fit for unit testing (individual modules on their own). BDD fits integration and end-to-end testing.
- TDD tests are implemented directly in code. BDD often describes steps in a language that is understandable to the
  whole team, not just developers.
- TDD unit tests are written by developers. BDD typically requires collaboration between roles. Test cases are written
  by a manual tester or analyst and implemented by an automation engineer.
- TDD validates function behavior; BDD validates user scenarios.

## Integration Testing [&uarr;](#testing)

Integration testing checks whether different modules and services used by the application work well together. For
example, you can test database integration or validate that microservices behave as intended. This type of testing is
more expensive because multiple components need to run at the same time.

## Unit Testing [&uarr;](#testing)

Unit testing checks individual units (modules, functions/methods, routines, etc.) to ensure correctness. This
low-level testing ensures smaller components are functionally sound and reduces the burden on higher-level tests.
Developers typically write these tests during development and run them as automated tests.

## Functional Testing [&uarr;](#testing)

Functional tests focus on business requirements. They validate the result of an action and do not verify intermediate
states of the system.

People often confuse integration and functional testing because both require multiple components to work together. The
difference is that integration tests only validate that components can communicate (for example, that you can send
requests to a database), while functional tests check that the system returns specific values according to product
requirements.
