<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum modes for glMatrixMode (OpenGL SDK / gl.h).
 */
enum MatrixMode: int
{
    case GL_MODELVIEW = 0x1700;
    case GL_PROJECTION = 0x1701;
    case GL_TEXTURE = 0x1702;
}
