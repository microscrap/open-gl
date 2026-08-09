<?php

use Microscrap\Bindings\OpenGL\Enums\TextureParameter;
use Microscrap\Bindings\OpenGL\Enums\TextureParameterName;
use Microscrap\Bindings\OpenGL\Enums\TextureTarget;
use Microscrap\Bindings\OpenGL\GL;
use Opengl\GL\GlTexture;

if (! function_exists('glGenTexture')) {
    function glGenTexture(): GlTexture
    {
        return GL::genTexture();
    }
}

if (! function_exists('glBindTexture')) {
    function glBindTexture(TextureTarget|int $target, GlTexture $texture): void
    {
        GL::bindTexture($target, $texture);
    }
}

if (! function_exists('glTexParameteri')) {
    function glTexParameteri(
        TextureTarget|int $target,
        TextureParameterName|int $pname,
        TextureParameter|int $param,
    ): void {
        GL::texParameteri($target, $pname, $param);
    }
}

if (! function_exists('glDeleteTexture')) {
    function glDeleteTexture(GlTexture $texture): void
    {
        GL::deleteTexture($texture);
    }
}
