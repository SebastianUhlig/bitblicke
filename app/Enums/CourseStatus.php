<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static IS_FREE()
 * @method static static IS_PARTLY_FREE()
 * @method static static IS_PAID()
 */
final class CourseStatus extends Enum
{
    const IS_FREE = 0;
    const IS_PARTLY_FREE = 1;
    const IS_PAID = 2;
}
