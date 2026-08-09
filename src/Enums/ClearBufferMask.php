<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLbitfield masks for glClear (OpenGL SDK / gl.h).
 */
enum ClearBufferMask: int
{
    case GL_DEPTH_BUFFER_BIT = 0x00000100;
    case GL_STENCIL_BUFFER_BIT = 0x00000400;
    case GL_COLOR_BUFFER_BIT = 0x00004000;
}
