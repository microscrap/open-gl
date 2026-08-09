<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum targets for buffer object binds (OpenGL SDK / gl.h).
 */
enum BufferTarget: int
{
    case GL_ARRAY_BUFFER = 0x8892;
    case GL_ELEMENT_ARRAY_BUFFER = 0x8893;
}
