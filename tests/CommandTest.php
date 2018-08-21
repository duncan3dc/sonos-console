<?php

namespace duncan3dc\Sonos\ConsoleTests;

use duncan3dc\Sonos\Console\Command;
use duncan3dc\Sonos\Interfaces\NetworkInterface;
use Mockery;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }


    public function testGetNetwork()
    {
        $command = new Command("phpunit:test");

        $result = $command->getNetwork();

        $this->assertInstanceOf(NetworkInterface::class, $result);
    }


    public function testSetNetwork()
    {
        $network = Mockery::mock(NetworkInterface::class);

        $command = new Command("phpunit:test");

        $command->setNetwork($network);

        $result = $command->getNetwork();

        $this->assertSame($network, $result);
    }
}
