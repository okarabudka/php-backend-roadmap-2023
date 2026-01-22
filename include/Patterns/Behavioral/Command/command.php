<?php
/**
 * Command pattern
 */

namespace Pattern;

/**
 * Base abstract class Command describes the common interface for commands
 */
abstract class Command
{
    /**
     * @var Receiver
     */
    protected $receiver;

    /**
     * Constructor
     *
     * @param Receiver $receiver - command receiver
     */
    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * Execute command by receiver
     *
     * @return string
     */
    public abstract function execute();
}

/**
 * ToggleOnCommand implements the toggle-on command
 */
class ToggleOnCommand extends Command
{
    /**
     * Execute command by receiver
     *
     * @return string
     */
    public function execute()
    {
        return $this->receiver->toggleOn();
    }
}

/**
 * ToggleOffCommand implements the toggle-off command
 */
class ToggleOffCommand extends Command
{
    /**
     * Execute command by receiver
     *
     * @return string
     */
    public function execute()
    {
        return $this->receiver->toggleOff();
    }
}

/**
 * Receiver implements the command receiver
 * Implements a set of actions the receiver should perform
 * depending on the received command
 */
class Receiver
{
    /**
     * Action for the \"toggle on\" command (ToggleOnCommand)
     *
     * @return string
     */
    public function toggleOn()
    {
        return "Toggle On";
    }

    /**
     * Action for the \"toggle off\" command (ToggleOffCommand)
     *
     * @return string
     */
    public function toggleOff()
    {
        return "Toggle Off";
    }
}

/**
 * Invoker implements the command initiator
 */
class Invoker
{
    /**
     * @var []Command
     */
    protected $commands = array();

    /**
     * Adds a command to the queue
     */
    public function storeCommand(Command $command)
    {
        array_push($this->commands, $command);
    }

    /**
     * Removes a command from the queue
     */
    public function UnStoreCommand()
    {
        array_pop($this->commands);
    }

    /**
     * Executes commands
     *
     * @return string
     */
    public function Execute()
    {
        $result = array();
        foreach ($this->commands as $command) {
            $result[] = $command->execute();
        }
        return join("", $result);
    }
}
