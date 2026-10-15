<?php

declare(strict_types=1);

require dirname(__DIR__) . '/src/SlapperParticle/ParticleOrbit.php';

use SlapperParticle\ParticleOrbit;

$first = ParticleOrbit::positions(10, 20, 30, 0);
if(count($first) !== 2){
	fwrite(STDERR, "Expected two orbit positions.\n");
	exit(1);
}

foreach($first as [$x, $y, $z]){
	$radius = hypot($x - 10, $z - 30);
	if(abs($radius - 0.8) > 0.000001 || abs($y - 21) > 0.000001){
		fwrite(STDERR, "Orbit position has an unexpected radius or height.\n");
		exit(1);
	}
}

if(abs(hypot($first[0][0] - $first[1][0], $first[0][2] - $first[1][2]) - 1.6) > 0.000001){
	fwrite(STDERR, "The two particles must occupy opposite positions on the orbit.\n");
	exit(1);
}

$rotated = ParticleOrbit::positions(10, 20, 30, 10);
if($rotated[0] === $first[0]){
	fwrite(STDERR, "The orbit must change over time.\n");
	exit(1);
}

echo "Particle orbit checks passed.\n";
