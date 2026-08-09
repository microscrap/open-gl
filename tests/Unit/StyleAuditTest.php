<?php

namespace DeptOfScrapyardRobotics\Tests\Unit;

/**
 * Style contract audit for src/:
 * no class constants, no throw statements, every helper guarded by
 * function_exists, every enum backed.
 */
function srcFiles(?string $subdir = null): array
{
    $root = dirname(__DIR__, 2) . '/src' . (is_null($subdir) ? '' : "/{$subdir}");
    $files = [];

    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $files[] = $file->getPathname();
        }
    }
    sort($files);

    return $files;
}

it('declares no class constants anywhere in src/', function (): void {
    foreach (srcFiles() as $file) {
        $tokens = \PhpToken::tokenize(file_get_contents($file));
        foreach ($tokens as $token) {
            expect($token->id)->not->toBe(T_CONST, "Class constant found in {$file} on line {$token->line}");
        }
    }
});

it('throws no exceptions anywhere in src/', function (): void {
    foreach (srcFiles() as $file) {
        $tokens = \PhpToken::tokenize(file_get_contents($file));
        foreach ($tokens as $token) {
            expect($token->id)->not->toBe(T_THROW, "throw statement found in {$file} on line {$token->line}");
        }
    }
});

it('guards every helper function with function_exists', function (): void {
    foreach (srcFiles('Helpers') as $file) {
        $tokens = array_values(array_filter(
            \PhpToken::tokenize(file_get_contents($file)),
            fn (\PhpToken $t) => ! $t->isIgnorable()
        ));

        foreach ($tokens as $i => $token) {
            if ($token->id !== T_FUNCTION) {
                continue;
            }

            $guarded = false;
            for ($j = $i - 1; $j >= max(0, $i - 12); $j--) {
                if ($tokens[$j]->id === T_STRING && $tokens[$j]->text === 'function_exists') {
                    $guarded = true;
                    break;
                }
            }

            expect($guarded)->toBeTrue("Unguarded function in {$file} on line {$token->line}");
        }
    }
});

it('backs every enum with int or string', function (): void {
    foreach (srcFiles('Enums') as $file) {
        $source = file_get_contents($file);
        expect($source)->toMatch(
            '/enum\s+\w+\s*:\s*(int|string)/',
            "Unbacked enum in {$file}"
        );
    }
});

it('uses fully uppercase enum case names', function (): void {
    foreach (srcFiles('Enums') as $file) {
        preg_match_all('/^\s+case\s+(\w+)\s*=/m', file_get_contents($file), $matches);
        expect($matches[1])->not->toBeEmpty();

        foreach ($matches[1] as $caseName) {
            expect($caseName)->toBe(strtoupper($caseName), "Non-uppercase enum case {$caseName} in {$file}");
        }
    }
});
