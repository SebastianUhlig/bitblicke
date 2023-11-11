<?php

namespace App\Helpers;

class FeatureFlag
{
    public static function enabled(string $feature): bool
    {
        return in_array($feature, config('feature-flags', [])) && config("feature-flags.{$feature}") === true;
    }

    public static function isShopEnabled(): bool
    {
        return self::enabled('shop');
    }
}
