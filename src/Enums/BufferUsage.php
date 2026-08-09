<?php

namespace Microscrap\Bindings\OpenGL\Enums;

/**
 * GLenum usage hints for glBufferData (OpenGL SDK / gl.h).
 */
enum BufferUsage: int
{
    case GL_STREAM_DRAW = 0x88E0;
    case GL_STREAM_READ = 0x88E1;
    case GL_STREAM_COPY = 0x88E2;
    case GL_STATIC_DRAW = 0x88E4;
    case GL_STATIC_READ = 0x88E5;
    case GL_STATIC_COPY = 0x88E6;
    case GL_DYNAMIC_DRAW = 0x88E8;
    case GL_DYNAMIC_READ = 0x88E9;
    case GL_DYNAMIC_COPY = 0x88EA;
}
