<?php

namespace duncan3dc\Sonos\ConsoleTests;

use duncan3dc\Sonos\Console\Command;
use duncan3dc\Sonos\Network;
use Mockery;

class CommandTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }


    public function testGetNetwork()
    {
        $command = new Command("phpunit:test");

        $result = $command->getNetwork();

        $this->assertInstanceOf(Network::class, $result);
    }


    public function testSetNetwork()
    {
        $network = Mockery::mock(Network::class);

        $command = new Command("phpunit:test");

        $command->setNetwork($network);

        $result = $command->getNetwork();

        $this->assertSame($network, $result);
    }
}
