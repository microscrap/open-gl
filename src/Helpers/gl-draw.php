<?php

use Microscrap\Bindings\OpenGL\Enums\PrimitiveMode;
use Microscrap\Bindings\OpenGL\GL;

if (! function_exists('glDrawArrays')) {
    function glDrawArrays(PrimitiveMode|int $mode, int $first, int $count): void
    {
        GL::drawArrays($mode, $first, $count);
    }
}
