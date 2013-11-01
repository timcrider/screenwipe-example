#!/bin/env php
<?php

// Run from script directory
chdir(__DIR__);

$updateInterval = 2;

function format_time($t,$f=':') // t = seconds, f = separator 
{
	return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}

$start = microtime(1);
$pass = 0;
while (1) {
	// Wipe the screen
	print chr(27).chr(91).'H'.chr(27).chr(91).'J';
	$pass++;

	// Do something
	$r = rand(5,15);
	for ($i = 0; $i <= $r; $i++) {
		print "Doing ($i) stuffs\n";
	}

	// Print a footer
	print "\n--------------------------------------\n";
	print "Current Time: ".date('Y-m-d H:i:s')."\n";
	print "On pass {$pass}. Script running for ".format_time(microtime(1)-$start)."\n";

	// Throttle the passes
	sleep($updateInterval);
}
