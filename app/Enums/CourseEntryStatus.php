<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CourseEntryStatus extends Enum
{
    const IS_FREE = 0;
    const IS_PARTLY_FREE = 1;
    const IS_PAID = 2;
}
