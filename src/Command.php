<?php

namespace duncan3dc\Sonos\Console;

use duncan3dc\Sonos\Network;

class Command extends \duncan3dc\Console\Command
{
    /** @var Network */
    private $network;

    /**
     * Set a specific sonos network instance to use.
     *
     * @param Network $network
     *
     * @return void
     */
    public function setNetwork(Network $network): void
    {
        $this->network = $network;
    }

    /**
     * Get the sonos network instance to use.
     *
     * @return Network
     */
    public function getNetwork(): Network
    {
        if ($this->network === null) {
            $this->network = new Network;
        }

        return $this->network;
    }
}
