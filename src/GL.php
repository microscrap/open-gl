<?php

namespace Microscrap\Bindings\OpenGL;

use Microscrap\Bindings\OpenGL\Enums\BufferTarget;
use Microscrap\Bindings\OpenGL\Enums\BufferUsage;
use Microscrap\Bindings\OpenGL\Enums\ClearBufferMask;
use Microscrap\Bindings\OpenGL\Enums\EnableCap;
use Microscrap\Bindings\OpenGL\Enums\GetPName;
use Microscrap\Bindings\OpenGL\Enums\MatrixMode;
use Microscrap\Bindings\OpenGL\Enums\PrimitiveMode;
use Microscrap\Bindings\OpenGL\Enums\ShaderType;
use Microscrap\Bindings\OpenGL\Enums\StringName;
use Microscrap\Bindings\OpenGL\Enums\TextureParameter;
use Microscrap\Bindings\OpenGL\Enums\TextureParameterName;
use Microscrap\Bindings\OpenGL\Enums\TextureTarget;
use Opengl\GL\GL as ExtGL;
use Opengl\GL\GlBuffer;
use Opengl\GL\GlProgram;
use Opengl\GL\GlShader;
use Opengl\GL\GlTexture;
use BackedEnum;

/**
 * Wraps Opengl\GL\GL. Method names drop the `gl` prefix
 * (glClearColor => GL::clearColor). Helpers keep the exact C names.
 *
 * Named objects stay as extension DTOs (GlBuffer, GlTexture, GlShader, GlProgram)
 * — same pattern as microscrap/ftdi with FTDIContext.
 */
final class GL
{
    public static function clearColor(float $red, float $green, float $blue, float $alpha): void
    {
        ExtGL::glClearColor($red, $green, $blue, $alpha);
    }

    public static function clear(ClearBufferMask|int $mask): void
    {
        ExtGL::glClear(self::enumValue($mask));
    }

    public static function viewport(int $x, int $y, int $width, int $height): void
    {
        ExtGL::glViewport($x, $y, $width, $height);
    }

    public static function scissor(int $x, int $y, int $width, int $height): void
    {
        ExtGL::glScissor($x, $y, $width, $height);
    }

    public static function enable(EnableCap|int $cap): void
    {
        ExtGL::glEnable(self::enumValue($cap));
    }

    public static function disable(EnableCap|int $cap): void
    {
        ExtGL::glDisable(self::enumValue($cap));
    }

    public static function flush(): void
    {
        ExtGL::glFlush();
    }

    public static function finish(): void
    {
        ExtGL::glFinish();
    }

    public static function getError(): int
    {
        return ExtGL::glGetError();
    }

    public static function getString(StringName|int $name): string
    {
        return ExtGL::glGetString(self::enumValue($name));
    }

    public static function getIntegerv(GetPName|int $pname): int
    {
        return ExtGL::glGetIntegerv(self::enumValue($pname));
    }

    public static function color4f(float $red, float $green, float $blue, float $alpha): void
    {
        ExtGL::glColor4f($red, $green, $blue, $alpha);
    }

    public static function begin(PrimitiveMode|int $mode): void
    {
        ExtGL::glBegin(self::enumValue($mode));
    }

    public static function end(): void
    {
        ExtGL::glEnd();
    }

    public static function vertex2f(float $x, float $y): void
    {
        ExtGL::glVertex2f($x, $y);
    }

    public static function vertex3f(float $x, float $y, float $z): void
    {
        ExtGL::glVertex3f($x, $y, $z);
    }

    public static function loadIdentity(): void
    {
        ExtGL::glLoadIdentity();
    }

    public static function matrixMode(MatrixMode|int $mode): void
    {
        ExtGL::glMatrixMode(self::enumValue($mode));
    }

    public static function ortho(
        float $left,
        float $right,
        float $bottom,
        float $top,
        float $zNear,
        float $zFar,
    ): void {
        ExtGL::glOrtho($left, $right, $bottom, $top, $zNear, $zFar);
    }

    public static function genBuffer(): GlBuffer
    {
        return ExtGL::glGenBuffer();
    }

    public static function bindBuffer(BufferTarget|int $target, GlBuffer $buffer): void
    {
        ExtGL::glBindBuffer(self::enumValue($target), $buffer);
    }

    public static function bufferData(BufferTarget|int $target, string $data, BufferUsage|int $usage): void
    {
        ExtGL::glBufferData(self::enumValue($target), $data, self::enumValue($usage));
    }

    public static function bufferDataObject(GlBuffer $buffer, string $data, BufferUsage|int $usage): void
    {
        ExtGL::glBufferDataObject($buffer, $data, self::enumValue($usage));
    }

    public static function deleteBuffer(GlBuffer $buffer): void
    {
        ExtGL::glDeleteBuffer($buffer);
    }

    public static function genTexture(): GlTexture
    {
        return ExtGL::glGenTexture();
    }

    public static function bindTexture(TextureTarget|int $target, GlTexture $texture): void
    {
        ExtGL::glBindTexture(self::enumValue($target), $texture);
    }

    public static function texParameteri(
        TextureTarget|int $target,
        TextureParameterName|int $pname,
        TextureParameter|int $param,
    ): void {
        ExtGL::glTexParameteri(self::enumValue($target), self::enumValue($pname), self::enumValue($param));
    }

    public static function deleteTexture(GlTexture $texture): void
    {
        ExtGL::glDeleteTexture($texture);
    }

    public static function createShader(ShaderType|int $type): GlShader
    {
        return ExtGL::glCreateShader(self::enumValue($type));
    }

    public static function shaderSource(GlShader $shader, string $source): void
    {
        ExtGL::glShaderSource($shader, $source);
    }

    public static function compileShader(GlShader $shader): bool
    {
        return ExtGL::glCompileShader($shader);
    }

    public static function getShaderInfoLog(GlShader $shader): string
    {
        return ExtGL::glGetShaderInfoLog($shader);
    }

    public static function deleteShader(GlShader $shader): void
    {
        ExtGL::glDeleteShader($shader);
    }

    public static function createProgram(): GlProgram
    {
        return ExtGL::glCreateProgram();
    }

    public static function attachShader(GlProgram $prog, GlShader $sh): void
    {
        ExtGL::glAttachShader($prog, $sh);
    }

    public static function linkProgram(GlProgram $prog): bool
    {
        return ExtGL::glLinkProgram($prog);
    }

    public static function getProgramInfoLog(GlProgram $prog): string
    {
        return ExtGL::glGetProgramInfoLog($prog);
    }

    public static function useProgram(GlProgram $prog): void
    {
        ExtGL::glUseProgram($prog);
    }

    public static function useProgramNone(): void
    {
        ExtGL::glUseProgramNone();
    }

    public static function deleteProgram(GlProgram $prog): void
    {
        ExtGL::glDeleteProgram($prog);
    }

    public static function drawArrays(PrimitiveMode|int $mode, int $first, int $count): void
    {
        ExtGL::glDrawArrays(self::enumValue($mode), $first, $count);
    }

    private static function enumValue(BackedEnum|int $value): int
    {
        return $value instanceof BackedEnum ? (int) $value->value : $value;
    }
}
