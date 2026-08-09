<?php

namespace DeptOfScrapyardRobotics\Tests\Support;

/**
 * Mechanical name transforms the package promises:
 * - glClearColor => GL::clearColor() / glClearColor()
 */
final class NameTransform
{
    /**
     * glClearColor => clearColor
     * glUseProgramNone => useProgramNone
     */
    public static function wrapperMethod(string $extensionMethod): string
    {
        if (str_starts_with($extensionMethod, 'gl')) {
            return lcfirst(substr($extensionMethod, 2));
        }

        return $extensionMethod;
    }

    /**
     * Helpers keep the exact C / extension method name.
     */
    public static function helperFunction(string $extensionMethod): string
    {
        return $extensionMethod;
    }
}
