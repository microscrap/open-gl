<?php

use Microscrap\Bindings\OpenGL\Enums\ShaderType;
use Microscrap\Bindings\OpenGL\GL;
use Opengl\GL\GlProgram;
use Opengl\GL\GlShader;

if (! function_exists('glCreateShader')) {
    function glCreateShader(ShaderType|int $type): GlShader
    {
        return GL::createShader($type);
    }
}

if (! function_exists('glShaderSource')) {
    function glShaderSource(GlShader $shader, string $source): void
    {
        GL::shaderSource($shader, $source);
    }
}

if (! function_exists('glCompileShader')) {
    function glCompileShader(GlShader $shader): bool
    {
        return GL::compileShader($shader);
    }
}

if (! function_exists('glGetShaderInfoLog')) {
    function glGetShaderInfoLog(GlShader $shader): string
    {
        return GL::getShaderInfoLog($shader);
    }
}

if (! function_exists('glDeleteShader')) {
    function glDeleteShader(GlShader $shader): void
    {
        GL::deleteShader($shader);
    }
}

if (! function_exists('glCreateProgram')) {
    function glCreateProgram(): GlProgram
    {
        return GL::createProgram();
    }
}

if (! function_exists('glAttachShader')) {
    function glAttachShader(GlProgram $prog, GlShader $sh): void
    {
        GL::attachShader($prog, $sh);
    }
}

if (! function_exists('glLinkProgram')) {
    function glLinkProgram(GlProgram $prog): bool
    {
        return GL::linkProgram($prog);
    }
}

if (! function_exists('glGetProgramInfoLog')) {
    function glGetProgramInfoLog(GlProgram $prog): string
    {
        return GL::getProgramInfoLog($prog);
    }
}

if (! function_exists('glUseProgram')) {
    function glUseProgram(GlProgram $prog): void
    {
        GL::useProgram($prog);
    }
}

if (! function_exists('glUseProgramNone')) {
    function glUseProgramNone(): void
    {
        GL::useProgramNone();
    }
}

if (! function_exists('glDeleteProgram')) {
    function glDeleteProgram(GlProgram $prog): void
    {
        GL::deleteProgram($prog);
    }
}
