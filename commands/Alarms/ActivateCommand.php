<?php

namespace duncan3dc\Sonos\Console\Alarms;

use duncan3dc\Sonos\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ActivateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setDescription("Activate an alarm")
            ->addArgument("id", InputArgument::REQUIRED, "The ID of the alarm to activate");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sonos = $this->getNetwork();

        $id = $input->getArgument("id");
        $alarm = $sonos->getAlarmById($id);

        $alarm->activate();

        $output->out("Active: {$alarm->isActive()}");
        $output->out("Time: {$alarm->getTime()}");
        $output->out("Duration: {$alarm->getDuration()}");
        $output->out("Room: {$alarm->getSpeaker()->room}");
        $output->out("Volume: {$alarm->getVolume()}");
        $output->out("Frequency: {$alarm->getFrequencyDescription()}");
    }
}
