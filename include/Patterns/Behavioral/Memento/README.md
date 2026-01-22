## Memento

The Memento pattern is a behavioral pattern at the object level.

Memento captures and stores an object's internal state outside the object so it can later be restored to the same
state. If a client later needs to roll back the object's state, it passes the memento back to the object for
restoration.

The pattern involves three objects:

1. Originator.
2. Memento - stores the state of the Originator object.
3. Caretaker - is responsible for keeping the Memento safe.

A memento is an object that stores a snapshot of some object's state: a string, a number, an array, a class instance,
 etc. Uniqueness here does not mean that equal states cannot exist in different snapshots; it means the state can be
extracted as an independent copy. Any object saved in a Memento must be a full copy of the original, not a reference.
The Memento itself is an opaque object (one that no one can or should modify).

The originator holds the current state of a specific type of object and can create a unique copy of that state wrapped
in a Memento object. The originator does not know the history of changes. The originator can be forced to set a
specific external state as current. The originator must ensure that this state matches the type it is allowed to work
with. The originator may (but does not have to) have any methods, but they cannot change the stored state.

The caretaker manages the history of snapshots. It can change the object, decide to save the object's state via the
originator, request a snapshot of the current state, or restore the originator to a previous snapshot.

## Real-world examples

    - Seed of a pseudorandom number generator.

    - Finite state machine state.

    - Tracking intermediate ORM model states before saving.

## Example

Required for implementation:

1. Originator class that has some changing state and can create and accept mementos of its state.
2. Memento class that stores Originator state.
3. Caretaker class that receives and stores the memento until it is needed by the originator.

## Applicability

### When you need to capture snapshots of an object's state (or part of it) so it can later be restored to that state.

    Memento allows you to create any number of snapshots and store them independently from the object. Snapshots are
    often used not only for undo but also for transactions, where the state must be rolled back if an operation fails.

### When direct access to an object's state exposes private implementation details, breaking encapsulation.

    The pattern suggests making the snapshot inside the object itself, since it can access all fields, including
    private ones.

## Implementation steps

1. Identify the originator class whose objects should create snapshots of their state.

2. Create a memento class and describe in it the same fields that exist in the originator class.

3. Make memento objects immutable. They should receive initial values only once, via their constructor.

4. If your language allows it, make the memento class nested in the originator class. If not, extract an empty
   interface that will be visible to other objects. Later you can add helper methods to this interface to access
   memento metadata, but direct access to originator data should be excluded.

5. Add a method in the originator to create mementos. The originator should create new memento objects and pass field
   values via the constructor.

The method signature should return mementos via the restricted interface if you have one. The originator should work
with the concrete memento class.

6. Add a method in the originator to restore from a memento. For type binding, follow the same logic as in step 4.

7. Caretakers, whether they are operation history, command objects, or something else, should know when to request
   snapshots from the originator, where to store them, and when to restore.

8. The link between caretakers and originators can be moved into the mementos. In that case each memento is bound to
   its originator and must restore its state itself. This only works if memento classes are nested in originator
   classes or if originators have setters for their fields.

## Pros and cons

    + Does not violate encapsulation of the original object.
    + Simplifies the original object's structure; it does not need to store version history.

    - Requires a lot of memory if clients create snapshots too often.
    - Can add memory overhead if history holders do not release resources for stale snapshots.
    - In some languages (for example, PHP, Python, JavaScript) it is hard to ensure only the originator can access the
      memento state.

## Relations with other patterns

1. `Command` and `Memento` can be used together to implement undo. Command objects perform actions on the target object,
   while mementos store a backup of its state before the command runs.

2. `Memento` can be used with `Iterator` to save the current traversal state and return to it later if needed.

3. `Memento` can sometimes be replaced with `Prototype` if the object whose state must be stored is simple and has no
   active references to external resources, or those can be restored easily.
