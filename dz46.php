#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;



$application = new Application();

$application->add(new App\Command\ShowMsg());
$application->add(new App\Command\ShowMsgTimes());
$application->add(new \App\Command\ShowUserInfo());

$application->run();

