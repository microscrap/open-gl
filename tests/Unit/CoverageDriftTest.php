<?php

namespace DeptOfScrapyardRobotics\Tests\Unit;

use DeptOfScrapyardRobotics\Tests\Support\NameTransform;

/**
 * Coverage drift guard: every method the extension exposes must have both
 * a wrapper method (per the name transform) and a global helper function.
 *
 * Method lists come from the live extension when loaded, otherwise from the
 * committed 0.7.0 stub snapshot — so the guard runs everywhere.
 */
function extensionMethods(string $extensionClass): array
{
    if (extension_loaded('opengl') && class_exists($extensionClass)) {
        return get_class_methods($extensionClass);
    }

    static $snapshot = null;
    if (is_null($snapshot)) {
        $snapshot = require __DIR__ . '/../Support/extension-methods-0.7.0.php';
    }

    return $snapshot[$extensionClass] ?? [];
}

$coverageMap = require __DIR__ . '/../Support/CoverageMap.php';

foreach ($coverageMap as [$wrapperClass, $extensionClass]) {
    it("wraps every {$extensionClass} method in {$wrapperClass}", function () use ($wrapperClass, $extensionClass): void {
        $extensionMethods = extensionMethods($extensionClass);
        expect($extensionMethods)->not->toBeEmpty();

        $missing = [];
        foreach ($extensionMethods as $method) {
            $wrapperMethod = NameTransform::wrapperMethod($method);
            if (! method_exists($wrapperClass, $wrapperMethod)) {
                $missing[] = "{$extensionClass}::{$method} => {$wrapperClass}::{$wrapperMethod}";
            }
        }

        expect($missing)->toBeEmpty("Missing wrapper methods:\n" . implode("\n", $missing));
    });

    it("exposes a helper function for every {$extensionClass} method", function () use ($extensionClass): void {
        $missing = [];
        foreach (extensionMethods($extensionClass) as $method) {
            $helper = NameTransform::helperFunction($method);
            if (! function_exists($helper)) {
                $missing[] = "{$extensionClass}::{$method} => {$helper}()";
            }
        }

        expect($missing)->toBeEmpty("Missing helper functions:\n" . implode("\n", $missing));
    });
}

it('keeps the stub snapshot in sync with the coverage map wrapper classes', function () use ($coverageMap): void {
    $snapshot = require __DIR__ . '/../Support/extension-methods-0.7.0.php';

    foreach ($coverageMap as [, $extensionClass]) {
        expect($snapshot)->toHaveKey($extensionClass);
    }
});
