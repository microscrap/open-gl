<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum capabilities for glEnable / glDisable (OpenGL SDK / gl.h subset).
 */
enum EnableCap: int
{
    case GL_CULL_FACE = 0x0B44;
    case GL_DEPTH_TEST = 0x0B71;
    case GL_BLEND = 0x0BE2;
    case GL_SCISSOR_TEST = 0x0C11;
    case GL_TEXTURE_2D = 0x0DE1;
}
