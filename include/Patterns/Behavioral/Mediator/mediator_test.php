<?php

namespace Pattern;

use PHPUnit_Framework_TestCase;

require 'mediator.php';

class MediatorTest extends PHPUnit_Framework_TestCase
{
    public function testMediator()
    {
        $mediator = new ConcreteMediator();

        $mediator->farmer = new Farmer($mediator);
        $mediator->cannery = new Cannery($mediator);
        $mediator->shop = new Shop($mediator);

        // The farmer grows 1000 tomatoes
        // and tells the mediator the work is done.
        // The mediator sends the tomatoes to the factory.
        // After the factory produces 250 ketchup packages,
        // it tells the mediator to deliver them to the shop.
        // In the end the shop sells ketchup for 20000 money units.
        $mediator->farmer->growTomato(1000);

        $this->assertEquals($mediator->shop->money, 20000);
    }
}
