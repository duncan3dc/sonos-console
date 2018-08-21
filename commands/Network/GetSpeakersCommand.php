<?php

namespace duncan3dc\Sonos\Console\Network;

use duncan3dc\Sonos\Console\Command;
use duncan3dc\SymfonyCLImate\Output;
use Symfony\Component\Console\Input\InputInterface;

class GetSpeakersCommand extends Command
{
    protected function configure()
    {
        $this
            ->setDescription("Get all the speakers on the current network")
            ->setHelp(<<<HELP
List all available speakers, and which room name they have assigned.
If you only have one speaker per room then network:get-rooms might be more useful
HELP
);
    }

    protected function command(InputInterface $input, Output $output)
    {
        $sonos = $this->getNetwork();
        $speakers = $sonos->getSpeakers();
        foreach ($speakers as $speaker) {
            $output->info()->inline("* {$speaker->name}");
            $output->comment(" (" . $speaker->room . ")");
        }
    }
}
