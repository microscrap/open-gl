<?php

use Microscrap\Bindings\OpenGL\Enums\BufferTarget;
use Microscrap\Bindings\OpenGL\Enums\BufferUsage;
use Microscrap\Bindings\OpenGL\GL;
use Opengl\GL\GlBuffer;

if (! function_exists('glGenBuffer')) {
    function glGenBuffer(): GlBuffer
    {
        return GL::genBuffer();
    }
}

if (! function_exists('glBindBuffer')) {
    function glBindBuffer(BufferTarget|int $target, GlBuffer $buffer): void
    {
        GL::bindBuffer($target, $buffer);
    }
}

if (! function_exists('glBufferData')) {
    function glBufferData(BufferTarget|int $target, string $data, BufferUsage|int $usage): void
    {
        GL::bufferData($target, $data, $usage);
    }
}

if (! function_exists('glBufferDataObject')) {
    function glBufferDataObject(GlBuffer $buffer, string $data, BufferUsage|int $usage): void
    {
        GL::bufferDataObject($buffer, $data, $usage);
    }
}

if (! function_exists('glDeleteBuffer')) {
    function glDeleteBuffer(GlBuffer $buffer): void
    {
        GL::deleteBuffer($buffer);
    }
}
