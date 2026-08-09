<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum targets for texture binds (OpenGL SDK / gl.h).
 */
enum TextureTarget: int
{
    case GL_TEXTURE_1D = 0x0DE0;
    case GL_TEXTURE_2D = 0x0DE1;
    case GL_TEXTURE_3D = 0x806F;
    case GL_TEXTURE_CUBE_MAP = 0x8513;
}
