<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum types for glCreateShader (OpenGL SDK / gl.h).
 */
enum ShaderType: int
{
    case GL_FRAGMENT_SHADER = 0x8B30;
    case GL_VERTEX_SHADER = 0x8B31;
}
