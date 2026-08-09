<?php

use Microscrap\Bindings\OpenGL\Enums\MatrixMode;
use Microscrap\Bindings\OpenGL\Enums\PrimitiveMode;
use Microscrap\Bindings\OpenGL\GL;

if (! function_exists('glColor4f')) {
    function glColor4f(float $red, float $green, float $blue, float $alpha): void
    {
        GL::color4f($red, $green, $blue, $alpha);
    }
}

if (! function_exists('glBegin')) {
    function glBegin(PrimitiveMode|int $mode): void
    {
        GL::begin($mode);
    }
}

if (! function_exists('glEnd')) {
    function glEnd(): void
    {
        GL::end();
    }
}

if (! function_exists('glVertex2f')) {
    function glVertex2f(float $x, float $y): void
    {
        GL::vertex2f($x, $y);
    }
}

if (! function_exists('glVertex3f')) {
    function glVertex3f(float $x, float $y, float $z): void
    {
        GL::vertex3f($x, $y, $z);
    }
}

if (! function_exists('glLoadIdentity')) {
    function glLoadIdentity(): void
    {
        GL::loadIdentity();
    }
}

if (! function_exists('glMatrixMode')) {
    function glMatrixMode(MatrixMode|int $mode): void
    {
        GL::matrixMode($mode);
    }
}

if (! function_exists('glOrtho')) {
    function glOrtho(
        float $left,
        float $right,
        float $bottom,
        float $top,
        float $zNear,
        float $zFar,
    ): void {
        GL::ortho($left, $right, $bottom, $top, $zNear, $zFar);
    }
}
