<?php

use Microscrap\Bindings\OpenGL\Enums\ClearBufferMask;
use Microscrap\Bindings\OpenGL\Enums\EnableCap;
use Microscrap\Bindings\OpenGL\Enums\GetPName;
use Microscrap\Bindings\OpenGL\Enums\StringName;
use Microscrap\Bindings\OpenGL\GL;

if (! function_exists('glClearColor')) {
    function glClearColor(float $red, float $green, float $blue, float $alpha): void
    {
        GL::clearColor($red, $green, $blue, $alpha);
    }
}

if (! function_exists('glClear')) {
    function glClear(ClearBufferMask|int $mask): void
    {
        GL::clear($mask);
    }
}

if (! function_exists('glViewport')) {
    function glViewport(int $x, int $y, int $width, int $height): void
    {
        GL::viewport($x, $y, $width, $height);
    }
}

if (! function_exists('glScissor')) {
    function glScissor(int $x, int $y, int $width, int $height): void
    {
        GL::scissor($x, $y, $width, $height);
    }
}

if (! function_exists('glEnable')) {
    function glEnable(EnableCap|int $cap): void
    {
        GL::enable($cap);
    }
}

if (! function_exists('glDisable')) {
    function glDisable(EnableCap|int $cap): void
    {
        GL::disable($cap);
    }
}

if (! function_exists('glFlush')) {
    function glFlush(): void
    {
        GL::flush();
    }
}

if (! function_exists('glFinish')) {
    function glFinish(): void
    {
        GL::finish();
    }
}

if (! function_exists('glGetError')) {
    function glGetError(): int
    {
        return GL::getError();
    }
}

if (! function_exists('glGetString')) {
    function glGetString(StringName|int $name): string
    {
        return GL::getString($name);
    }
}

if (! function_exists('glGetIntegerv')) {
    function glGetIntegerv(GetPName|int $pname): int
    {
        return GL::getIntegerv($pname);
    }
}
