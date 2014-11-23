<?php

namespace duncan3dc\Sonos\Console\Network;

use duncan3dc\Console\Command;
use duncan3dc\Sonos\Network;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $speakers = Network::getSpeakers();
        foreach ($speakers as $speaker) {
            $output->write("<info>* " . $speaker->name . "</info>");
            $output->writeln("<comment> (" . $speaker->room . ")</comment>");
        }
    }
}
