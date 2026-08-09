<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum names for glGetString (OpenGL SDK / gl.h).
 */
enum StringName: int
{
    case GL_VENDOR = 0x1F00;
    case GL_RENDERER = 0x1F01;
    case GL_VERSION = 0x1F02;
    case GL_EXTENSIONS = 0x1F03;
}
