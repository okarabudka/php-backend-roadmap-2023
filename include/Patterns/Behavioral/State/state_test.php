<?php

namespace Pattern;

use PHPUnit_Framework_TestCase;

require 'state.php';

class StateTest extends PHPUnit_Framework_TestCase
{
    public function testState()
    {
        $expect = "Vrrr... Brrr... Vrrr..." .
            "Vrrr... Brrr... Vrrr..." .
            "White roses, white roses. Defenseless are the thorns...";

        $modile = new ModileAlert(new MobileAlertVibration());

        $result = $modile->alert();
        $result .= $modile->alert();

        $modile->setState(new MobileAlertSong());

        $result .= $modile->alert();

        $this->assertEquals($result, $expect);
    }
}
