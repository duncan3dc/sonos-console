<?php

namespace duncan3dc\Sonos\Console;

use duncan3dc\DomParser\XmlParser;
use duncan3dc\Helpers\Helper;
use React\EventLoop\Factory;
use React\Http\Server as HttpServer;
use React\Socket\Server as Socket;
use React\Stream\Stream;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends Command
{
    protected function configure()
    {
        $this
            ->setDescription("Run the command line Sonos app");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sonos = $this->getNetwork();

        $ip = trim(exec("hostname --all-ip-addresses"));
        $port = 10505;

        $controllers = [];
        foreach ($sonos->getControllers() as $controller) {
            # Subscribe to events for this controller
            $data = Helper::curl([
                "url"       =>  "http://" . $controller->ip . ":1400/MediaRenderer/AVTransport/Event",
                "custom"    =>  "SUBSCRIBE",
                "headers"   =>  [
                    "CALLBACK"  =>  "<http://{$ip}:{$port}/>",
                    "NT"        =>  "upnp:event",
                    "TIMEOUT"   =>  "Second-600",
                ],
                "returnheaders" =>  true,
            ]);
            $sid = $data["headers"]["SID"];
            $controllers[$sid] = $controller;
        }

        $loop = Factory::create();

        $socket = new Socket($loop);
        $http = new HttpServer($socket);
        $http->on("request", function($request, $response) use ($controllers) {
            if ($request->getMethod() !== "NOTIFY") {
                $response->writeHead(403);
                $response->end();
                return;
            }

            $headers = $request->getHeaders();
            $sid = $headers["SID"];
            $controller = $controllers[$sid];

            $size = $headers["CONTENT-LENGTH"];

            $xml = "";
            $request->on("data", function($data) use ($response, $controller, &$xml, $size) {
                $xml .= $data;
                echo "data (" . strlen($xml) . ") [{$size}]\n";
                if (strlen($xml) < $size) {
                    return;
                }

                $xml = (new XmlParser($xml))->getTag("LastChange")->nodeValue;
                $event = (new XmlParser($xml))->getTag("InstanceID");
                echo $controller->room . "\n";
                echo $event->output() . "\n";
                echo "-------------------------------------------------------------------------------------------------\n";

                $response->writeHead(200);
                $response->end();
            });
        });
        $socket->listen($port, $ip);

        $stdin = new Stream(fopen("php://stdin", "r"), $loop);
        $stdin->on("data", function($line) {
            $line = trim($line);
            echo $line . "\n";
        });

        $loop->run();
    }
}
