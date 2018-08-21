<?php

namespace duncan3dc\Sonos\Console;

use duncan3dc\Sonos\Interfaces\NetworkInterface;
use duncan3dc\Sonos\Network;

class Command extends \duncan3dc\Console\Command
{
    /** @var NetworkInterface */
    private $network;

    /**
     * Set a specific sonos network instance to use.
     *
     * @param NetworkInterface $network
     *
     * @return void
     */
    public function setNetwork(NetworkInterface $network): void
    {
        $this->network = $network;
    }

    /**
     * Get the sonos network instance to use.
     *
     * @return NetworkInterface
     */
    public function getNetwork(): NetworkInterface
    {
        if ($this->network === null) {
            $this->network = new Network();
        }

        return $this->network;
    }
}
