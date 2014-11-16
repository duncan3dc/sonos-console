<?php

namespace duncan3dc\Sonos\Console;

class Command extends \Symfony\Component\Console\Command\Command
{
    public function __construct()
    {
        $name = str_replace(__NAMESPACE__ . "\\", "", static::class);
        $name = preg_replace_callback("/^([A-Z])(.*)Command$/", function($match) {
            return strtolower($match[1]) . $match[2];
        }, $name);
        $name = preg_replace_callback("/(\\\\)?([A-Z])/", function($match) {
            $result = ($match[1]) ? ":" : "-";
            $result .= strtolower($match[2]);
            return $result;
        }, $name);

        parent::__construct($name);
    }
}
