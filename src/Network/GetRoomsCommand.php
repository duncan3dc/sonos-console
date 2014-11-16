<?php

namespace duncan3dc\Sonos\Console\Network;

use duncan3dc\Sonos\Console\Command;
use duncan3dc\Sonos\Network;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $speakers = Network::getSpeakers();
        foreach ($speakers as $speaker) {
            $output->writeln("<info>* " . $speaker->room . "</info>");
        }
    }
}
