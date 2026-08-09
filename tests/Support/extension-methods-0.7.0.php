<?php

/**
 * Committed method list for Opengl\GL\GL as of php-io-extensions/open-gl 0.7.0.
 * Used when ext-opengl is not loaded so the coverage guard still runs.
 */

return [
    'Opengl\\GL\\GL' => [
        'glClearColor',
        'glClear',
        'glViewport',
        'glScissor',
        'glEnable',
        'glDisable',
        'glFlush',
        'glFinish',
        'glGetError',
        'glGetString',
        'glGetIntegerv',
        'glColor4f',
        'glBegin',
        'glEnd',
        'glVertex2f',
        'glVertex3f',
        'glLoadIdentity',
        'glMatrixMode',
        'glOrtho',
        'glGenBuffer',
        'glBindBuffer',
        'glBufferData',
        'glBufferDataObject',
        'glDeleteBuffer',
        'glGenTexture',
        'glBindTexture',
        'glTexParameteri',
        'glDeleteTexture',
        'glCreateShader',
        'glShaderSource',
        'glCompileShader',
        'glGetShaderInfoLog',
        'glDeleteShader',
        'glCreateProgram',
        'glAttachShader',
        'glLinkProgram',
        'glGetProgramInfoLog',
        'glUseProgram',
        'glUseProgramNone',
        'glDeleteProgram',
        'glDrawArrays',
    ],
];
