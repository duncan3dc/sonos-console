<?php

namespace duncan3dc\Sonos\Console\Network;

use duncan3dc\Sonos\Console\Command;
use duncan3dc\SymfonyCLImate\Output;
use Symfony\Component\Console\Input\InputInterface;

class GetRoomsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setDescription("Get all the rooms on the current network")
            ->setHelp(<<<HELP
This command is useful if you only have one speaker per room,
otherwise network:get-speakers might be more useful.
HELP
        );
    }

    protected function command(InputInterface $input, Output $output)
    {
        $sonos = $this->getNetwork();
        $speakers = $sonos->getSpeakers();
        foreach ($speakers as $speaker) {
            $output->info("* " . $speaker->getRoom());
        }
    }
}
