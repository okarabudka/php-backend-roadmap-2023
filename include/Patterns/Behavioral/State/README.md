## State

The State pattern is a behavioral pattern at the object level.

State lets an object change its behavior depending on its internal state and is an object-oriented implementation of a
finite state machine. The object's behavior changes so much that it appears as if the object's class has changed.

The pattern should be used when object behavior depends on its state and must change during program execution, when
there are enough states that using conditional operators scattered across code is too difficult.

## Example

Required for implementation:

1. Context class that represents a finite state machine.
2. Abstract State class that defines the interface for different states.
3. ConcreteStateA class that implements one behavior associated with a particular state.
4. ConcreteStateB class that implements one behavior associated with a particular state.

## Applicability

### When you have an object whose behavior changes dramatically depending on internal state, and there are many state types whose code changes often.

    The pattern suggests extracting all fields and methods related to specific states into separate classes. The original
    object will reference one of the state objects and delegate part of its work to it. To change state in the context,
    you just substitute a different state object.

### When a class contains many large, similar conditional statements that choose behaviors based on current field values.

    The pattern suggests moving each branch of such a conditional into its own class. You can also place all fields
    related to that state there.

### When you deliberately use a tabular state machine built with conditionals, but must tolerate duplicated code for similar states and transitions.

    State allows you to implement a hierarchical state machine based on inheritance. You can inherit similar states from
    a single parent class and move all duplicated code there.

## Implementation steps

1. Decide which class will act as the context. It can be an existing class that already depends on state, or a new
   class if state code is scattered across several classes.

2. Create a common state interface. It should describe the methods common to all states found in the context. Note that
   you should not move all context behavior into state, only what depends on state.

3. For each actual state, create a class that implements the state interface. Move code related to specific states into
   the appropriate classes. Eventually, all state interface methods must be implemented by all state classes.

When moving behavior from the context you may find it depends on private fields or methods of the context that state
objects cannot access. There are a couple of ways around this.

The simplest is to keep that behavior in the context and call it from the state object. Another option is to make state
classes nested in the context class so they can access private parts of the context. This is available only in some
languages (for example, Java, C#).

4. Add a field in the context to store state objects and a public method to change that field.

5. Replace old context methods that had state-dependent code with calls to the corresponding methods on the state
   object.

6. Depending on business logic, place the code that switches context state either inside the context or inside concrete
   state classes.

## Pros and cons

    + Removes many large conditional statements of the state machine.
    + Concentrates code related to a specific state in one place.
    + Simplifies context code.

    - Can overcomplicate the code if there are few states and they rarely change.

## Relations with other patterns

1. Bridge, Strategy, and State (and slightly Adapter) have similar class structures: all are based on composition, i.e.,
   delegating work to other objects. They differ in the problems they solve. Patterns are not just recipes for building
   code, but descriptions of problems that led to the solution.

2. State can be seen as an extension of Strategy. Both patterns use composition to change behavior of the main object by
   delegating work to helper objects. In Strategy these objects do not know about each other. In State the concrete
   states can switch the context.
