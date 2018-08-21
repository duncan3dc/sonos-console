sonos-console
=============

A command line application for controlling Sonos networks.

[![release](https://poser.pugx.org/duncan3dc/sonos-console/version.svg)](https://packagist.org/packages/duncan3dc/sonos-console)
[![build](https://travis-ci.org/duncan3dc/sonos-console.svg?branch=master)](https://travis-ci.org/duncan3dc/sonos-console)
[![coverage](https://codecov.io/gh/duncan3dc/sonos-console/graph/badge.svg)](https://codecov.io/gh/duncan3dc/sonos-console)


Usage
-----

No compiled phar is available yet, until it is you will need to either clone this repo, or download the latest release package from GitHub.

Once you have the source code, the console application can be run from the root of the repo like so:
```
./bin/sonos
```

This will list all available commands.


Help
----

All commands have help available via the -h/--help option or the help command itself:
```
./bin/sonos network:get-rooms -h
./bin/sonos network:get-rooms --help
./bin/sonos help network:get-rooms
```


Changelog
---------
A [Changelog](CHANGELOG.md) has been available since version 0.1.0


Where to get help
-----------------
Found a bug? Got a question? Just not sure how something works?  
Please [create an issue](//github.com/duncan3dc/sonos-console/issues) and I'll do my best to help out.  
Alternatively you can catch me on [Twitter](https://twitter.com/duncan3dc)
