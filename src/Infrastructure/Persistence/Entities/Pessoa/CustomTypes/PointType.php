<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Pessoa\CustomTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PointType extends Type
{
    public const string NAME = 'point';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'geometry(POINT, 4326)';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        if ($value === null) {
            return null;
        }

        if (preg_match('/POINT\(([-\d.]+) ([-\d.]+)\)/', $value, $matches)) {
            return ['lon' => (float)$matches[1], 'lat' => (float)$matches[2]];
        }

        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value === null) {
            return null;
        }

        return sprintf('POINT(%F %F)', $value['lon'], $value['lat']);
    }

    public function getName(): string
    {
        return self::NAME;
    }
}