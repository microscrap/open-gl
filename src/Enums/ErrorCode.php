<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum values returned by glGetError (OpenGL SDK / gl.h).
 */
enum ErrorCode: int
{
    case GL_NO_ERROR = 0;
    case GL_INVALID_ENUM = 0x0500;
    case GL_INVALID_VALUE = 0x0501;
    case GL_INVALID_OPERATION = 0x0502;
    case GL_STACK_OVERFLOW = 0x0503;
    case GL_STACK_UNDERFLOW = 0x0504;
    case GL_OUT_OF_MEMORY = 0x0505;
}
