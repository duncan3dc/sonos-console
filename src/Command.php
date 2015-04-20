<?php

namespace duncan3dc\Sonos\Console;

use duncan3dc\Sonos\Network;

class Command extends \duncan3dc\Console\Command
{
    protected $network;

    public function setNetwork(Network $network)
    {
        $this->network = $network;
    }

    public function getNetwork()
    {
        if ($this->network === null) {
            $this->network = new Network;
        }

        return $this->network;
    }
}
