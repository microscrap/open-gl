<?php

use Microscrap\Bindings\OpenGL\Enums\ClearBufferMask;
use Microscrap\Bindings\OpenGL\Enums\PrimitiveMode;
use Microscrap\Bindings\OpenGL\Enums\ShaderType;
use Microscrap\Bindings\OpenGL\Enums\StringName;

it('backs ClearBufferMask cases to OpenGL SDK token values', function (): void {
    expect(ClearBufferMask::GL_COLOR_BUFFER_BIT->value)->toBe(0x00004000)
        ->and(ClearBufferMask::GL_DEPTH_BUFFER_BIT->value)->toBe(0x00000100)
        ->and(ClearBufferMask::GL_STENCIL_BUFFER_BIT->value)->toBe(0x00000400);
});

it('backs StringName cases to OpenGL SDK token values', function (): void {
    expect(StringName::GL_VENDOR->value)->toBe(0x1F00)
        ->and(StringName::GL_RENDERER->value)->toBe(0x1F01)
        ->and(StringName::GL_VERSION->value)->toBe(0x1F02);
});

it('backs PrimitiveMode and ShaderType cases', function (): void {
    expect(PrimitiveMode::GL_QUADS->value)->toBe(0x0007)
        ->and(PrimitiveMode::GL_TRIANGLES->value)->toBe(0x0004)
        ->and(ShaderType::GL_VERTEX_SHADER->value)->toBe(0x8B31)
        ->and(ShaderType::GL_FRAGMENT_SHADER->value)->toBe(0x8B30);
});
