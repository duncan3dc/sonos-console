sonos-console
=============

A command line application for controlling Sonos networks.

[![Latest Stable Version](https://poser.pugx.org/duncan3dc/sonos-console/version.svg)](https://packagist.org/packages/duncan3dc/sonos-console)
[![Build Status](https://travis-ci.org/duncan3dc/sonos-console.svg?branch=master)](https://travis-ci.org/duncan3dc/sonos-console)
[![Coverage Status](https://coveralls.io/repos/github/duncan3dc/sonos-console/badge.svg)](https://coveralls.io/github/duncan3dc/sonos-console)


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
