<?php

namespace duncan3dc\Sonos\Console\Alarms;

use duncan3dc\Sonos\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Command
{
    protected function configure()
    {
        $this
            ->setDescription("Get all the speakers on the current network")
            ->addOption("active", null, InputOption::VALUE_OPTIONAL, "Filter active/inactive alarms")
            ->setHelp(<<<HELP
List all alarms set up on the current network
HELP
);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sonos = $this->getNetwork();

        $alarms = $sonos->getAlarms();

        foreach ($alarms as $alarm) {
            if ($input->getOption("active") !== null) {
                if ($input->getOption("active") != $alarm->isActive()) {
                    continue;
                }
            }

            $output->out("Alarm ID: {$alarm->getId()}");
            $output->out("Active: {$alarm->isActive()}");
            $output->out("Time: {$alarm->getTime()}");
            $output->out("Duration: {$alarm->getDuration()}");
            $output->out("Room: {$alarm->getSpeaker()->room}");
            $output->out("Volume: {$alarm->getVolume()}");
            $output->out("Frequency: {$alarm->getFrequencyDescription()}");
            $output->border();
        }
    }
}
