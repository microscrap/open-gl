<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum pnames for glGetIntegerv (OpenGL SDK / gl.h subset used by this binding).
 */
enum GetPName: int
{
    case GL_VIEWPORT = 0x0BA2;
    case GL_MAX_TEXTURE_SIZE = 0x0D33;
    case GL_MAX_COMBINED_TEXTURE_IMAGE_UNITS = 0x8B4D;
    case GL_CURRENT_PROGRAM = 0x8B8D;
}
