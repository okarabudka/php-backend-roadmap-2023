<?php
/**
 * State pattern
 *
 * The example describes notification options for a mobile phone user.
 * In practice, it would be better to implement state changes inside the
 * notification system (ModileAlert) based on some criteria, for example,
 * using a configuration file. For simplicity, this example uses external
 * state changes via the SetState() method.
 */

namespace Pattern;

/**
 * ModileAlertStater describes the common interface for different states
 */
abstract class ModileAlertStater
{
    /**
     * Notification based on the internal state
     *
     * @return string
     */
    public abstract function alert();
}

/**
 * ModileAlert implements notification based on its state
 */
class ModileAlert
{
    /**
     * @var ModileAlertStater
     */
    protected $state;

    /**
     * Constructor
     *
     * @param ModileAlertStater $state - state
     */
    public function __construct(ModileAlertStater $state)
    {
        $this->state = $state;
    }

    /**
     * Notification based on the internal state
     *
     * @return string
     */
    public function alert()
    {
        return $this->state->alert();
    }

    /**
     * Changes the state
     */
    public function setState(ModileAlertStater $state)
    {
        $this->state = $state;
    }
}

/**
 * MobileAlertVibration implements vibration-only notifications
 */
class MobileAlertVibration extends ModileAlertStater
{
    /**
     * Vibration notification
     *
     * @return string
     */
    public function alert()
    {
        return "Vrrr... Brrr... Vrrr...";
    }
}

/**
 * MobileAlertSong implements sound-only notifications
 */
class MobileAlertSong extends ModileAlertStater
{
    /**
     * Sound notification
     *
     * @return string
     */
    public function alert()
    {
        return "White roses, white roses. Defenseless are the thorns...";
    }
}
