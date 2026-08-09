<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum pnames for glTexParameteri (OpenGL SDK / gl.h).
 */
enum TextureParameterName: int
{
    case GL_TEXTURE_MAG_FILTER = 0x2800;
    case GL_TEXTURE_MIN_FILTER = 0x2801;
    case GL_TEXTURE_WRAP_S = 0x2802;
    case GL_TEXTURE_WRAP_T = 0x2803;
}
