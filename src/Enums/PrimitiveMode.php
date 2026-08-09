<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum modes for glBegin / glDrawArrays (OpenGL SDK / gl.h).
 */
enum PrimitiveMode: int
{
    case GL_POINTS = 0x0000;
    case GL_LINES = 0x0001;
    case GL_LINE_LOOP = 0x0002;
    case GL_LINE_STRIP = 0x0003;
    case GL_TRIANGLES = 0x0004;
    case GL_TRIANGLE_STRIP = 0x0005;
    case GL_TRIANGLE_FAN = 0x0006;
    case GL_QUADS = 0x0007;
    case GL_QUAD_STRIP = 0x0008;
    case GL_POLYGON = 0x0009;
}
