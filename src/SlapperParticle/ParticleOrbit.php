<?php

declare(strict_types=1);

namespace SlapperParticle;

final class ParticleOrbit{
	/**
	 * @return list<array{float, float, float}>
	 */
	public static function positions(float $centerX, float $centerY, float $centerZ, int $tick) : array{
		$angle = $tick * M_PI / 20;
		$height = 1 + sin($tick * M_PI / 40) * 0.5;
		$radius = 0.8;

		return [
			[
				$centerX + cos($angle) * $radius,
				$centerY + $height,
				$centerZ + sin($angle) * $radius
			],
			[
				$centerX + cos($angle + M_PI) * $radius,
				$centerY + $height,
				$centerZ + sin($angle + M_PI) * $radius
			]
		];
	}
}
