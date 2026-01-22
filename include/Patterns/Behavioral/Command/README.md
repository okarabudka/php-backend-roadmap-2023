## Command - Also known as: Action, Transaction

The Command pattern is a behavioral pattern at the object level.

The Command pattern lets you represent a request as an object. A command is an object. Such requests can be queued,
undone, or resumed.

In this pattern we use these terms:
Command - a request object to execute.
Receiver - the object that will handle the command.
Invoker - the object that initiates the request.

Command separates the object that triggers an operation from the object that knows how to perform it. The only thing
the initiator must know is how to send the command.

## Example

Required for implementation:

1. Base abstract Command class that defines the command interface.
2. ConcreteCommand class that implements the command.
3. Invoker class that stores a command and triggers its execution.
4. Receiver class that implements the receiver and contains a set of actions that the command can request.

Invoker can stack commands and run them on some event. You can ask Invoker to cancel a command as long as it has not
been executed.

ConcreteCommand contains requests to Receiver, which Receiver must execute. Receiver only contains a set of actions
that are called by ConcreteCommand.

## Applicability

### When you want to parameterize objects with actions.

    Command turns operations into objects. Objects can be passed, stored, and swapped inside other objects.

    Say you are developing a GUI menu library and want users to be able to use the menu in different apps without
    changing your class code. Using the pattern, users will configure menu objects with different commands instead of
    modifying the menu classes.

### When you want to queue operations, schedule them, or send them over the network.

    Like any other objects, commands can be serialized, i.e., turned into a string to store in a file or database.
    Later you can restore the command object and execute it. Commands can also be sent over the network, logged, or
    executed on a remote server.

### When you need undo.

    The main thing you need for undo is history. Among the many ways to implement it, the Command pattern is probably
    the most popular.

    Command history looks like a stack that stores all executed command objects. Each command, before execution, saves
    the current state of the object it will work with. After the operation, a copy of the command goes into the
    history stack, still carrying the saved state. If undo is needed, the program takes the last command from history
    and restores the saved state.

    This approach has two features. First, the exact object state can be hard to save because part of it can be
    private. The Memento pattern can help with that.

    Second, state copies can take a lot of memory. Sometimes you can use an alternative implementation where instead
    of restoring the old state the command performs an inverse action. The downside is complexity (and sometimes
    impossibility) of implementing inverse actions.

## Implementation steps

1. Create a common command interface and define an execution method on it.

2. One by one create concrete command classes. Each class should have a field to store a reference to one or more
   receiver objects that do the actual work.

The command should also have fields for parameters needed to call receiver methods. All these fields should be
provided via the constructor.

Finally, implement the main command method by calling the appropriate receiver methods.

3. Add command fields to sender classes. Usually senders accept ready command objects from the outside, via a
   constructor or a setter.

4. Change sender code so that it delegates execution to the command.

5. Initialization order should look like this:
    - Create receiver objects.
    - Create command objects and bind them to receivers.
    - Create sender objects and bind them to commands.

## Pros and cons

    + Removes the direct dependency between objects that call operations and the objects that execute them.
    + Enables simple undo and redo.
    + Enables deferred execution.
    + Allows building complex commands from simple ones.
    + Follows the open/closed principle.

    - Increases code complexity due to many additional classes.

Relations with other patterns

1. `Chain of Responsibility`, `Command`, `Mediator`, and `Observer` show different ways to work with request senders
   and receivers:
   `Chain of Responsibility` passes a request through a chain of potential receivers until one handles it.
   `Command` sets up an indirect one-way connection from senders to receivers.
   `Mediator` removes direct connections between senders and receivers, making them communicate through itself.
   `Observer` broadcasts a request to all interested receivers, while allowing them to subscribe or unsubscribe.

2. Handlers in `Chain of Responsibility` can be implemented as `Commands`. In that case many different operations can
   be applied to the same context, which is the request.

Another approach is when the request itself is a `Command` sent through a chain of objects. In that case the same
operation can be performed on many different contexts represented as a chain.

3. `Command` and `Memento` can be used together to implement undo. Command objects perform actions on the target
   object, while mementos store a backup of its state before the command runs.

4. `Command` and `Strategy` are similar in spirit but differ in scale and use:
   `Command` turns diverse actions into objects. Operation parameters become fields on the object, which can then be
   logged, stored in history for undo, passed to external services, and so on.
   `Strategy`, on the other hand, describes different ways to do the same action, allowing them to be swapped in a
   context object.

5. If you need to copy `Command` before inserting it into the history, `Prototype` can help.

6. `Visitor` can be seen as an advanced analog of `Command` that can work with multiple kinds of receivers.
