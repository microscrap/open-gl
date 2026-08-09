<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * Common GLint params for glTexParameteri (OpenGL SDK / gl.h).
 */
enum TextureParameter: int
{
    case GL_NEAREST = 0x2600;
    case GL_LINEAR = 0x2601;
    case GL_NEAREST_MIPMAP_NEAREST = 0x2700;
    case GL_LINEAR_MIPMAP_NEAREST = 0x2701;
    case GL_NEAREST_MIPMAP_LINEAR = 0x2702;
    case GL_LINEAR_MIPMAP_LINEAR = 0x2703;
    case GL_REPEAT = 0x2901;
    case GL_CLAMP_TO_EDGE = 0x812F;
    case GL_MIRRORED_REPEAT = 0x8370;
}
