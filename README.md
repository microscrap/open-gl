# microscrap/open-gl — OpenGL bindings for PHP

> **Docs (production):** [ScrapyardIO · microscrap/open-gl 0.7.x](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview)

[![Docs](https://img.shields.io/badge/docs-ScrapyardIO-0ea5e9?logo=readthedocs&logoColor=white)](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview)
[![CI](https://github.com/microscrap/open-gl/actions/workflows/tests.yml/badge.svg?branch=0.7.x)](https://github.com/microscrap/open-gl/actions/workflows/tests.yml)
[![Packagist Version](https://img.shields.io/packagist/v/microscrap/open-gl.svg?label=packagist)](https://packagist.org/packages/microscrap/open-gl)
[![PHP Version Require](https://img.shields.io/packagist/php-v/microscrap/open-gl.svg)](https://packagist.org/packages/microscrap/open-gl)
[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Requires ext-opengl](https://img.shields.io/badge/ext--opengl-%5E0.7-777bb4?logo=php&logoColor=white)](https://github.com/php-io-extensions/open-gl)
[![Tests](https://img.shields.io/badge/tests-Pest-95B46A?logo=php&logoColor=white)](https://pestphp.com)

PHP library that wraps the [**open-gl**](https://github.com/php-io-extensions/open-gl) extension (`ext-opengl`) with global helpers, enums, and a static wrapper class. Every helper delegates to `Microscrap\Bindings\OpenGL\GL`, which is the only layer that calls `Opengl\GL\GL`.

Token constants from the OpenGL SDK (`GL_COLOR_BUFFER_BIT`, …) live here as backed PHP enums — the native extension does not expose them.

This is the **bindings** package — not the native extension. Ecosystem docs: [`0.7.x`](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview).

## Highlights

* Two calling styles — exact C names (`glClearColor(...)`) or static wrapper (`GL::clearColor(...)`)
* Named objects stay as extension DTOs (`Opengl\GL\GlBuffer`, `GlTexture`, `GlShader`, `GlProgram`) with public `fd`
* Enum layer transcribed from the OpenGL SDK / `gl.h` for the slice-1 API surface
* C-style error handling: no exceptions in `src/`; details via `glGetError()`
* Coverage drift + style audit Pest guards keep the wrap 1:1 with the extension

## Requirements

* PHP 8.3+
* **ext-opengl** ^0.7.0 — install from [php-io-extensions/open-gl](https://github.com/php-io-extensions/open-gl)
* A current OpenGL context from **glfw** or **sdl3** before draw calls succeed

## Installation

Confirm **ext-opengl** is loaded:

```bash
php -m | grep opengl
```

```bash
composer require microscrap/open-gl
```

Composer autoloads helper files in `src/Helpers/`, registering global `gl*` functions when the package is installed. Helpers are only defined if the name is not already taken (`function_exists` guard).

> **Note:** `microscrap/glfw` also defines a small subset of `gl*` helpers for visual proofs. Prefer this package as the canonical OpenGL binding; load order decides which definition wins under the guard.

## The two calling styles

**C-ish** — global functions with exact OpenGL C / extension names:

```php
use Microscrap\Bindings\OpenGL\Enums\ClearBufferMask;
use Microscrap\Bindings\OpenGL\Enums\StringName;

glClearColor(0.1, 0.1, 0.12, 1.0);
glClear(ClearBufferMask::GL_COLOR_BUFFER_BIT);
echo glGetString(StringName::GL_VERSION);
```

**OO-ish** — static wrapper class, same behavior:

```php
use Microscrap\Bindings\OpenGL\GL;
use Microscrap\Bindings\OpenGL\Enums\ClearBufferMask;
use Microscrap\Bindings\OpenGL\Enums\StringName;

GL::clearColor(0.1, 0.1, 0.12, 1.0);
GL::clear(ClearBufferMask::GL_COLOR_BUFFER_BIT);
echo GL::getString(StringName::GL_VERSION);
```

Helpers never touch the extension directly; they delegate one-to-one to `GL`, which is the only layer calling `Opengl\GL\GL`. Flag/enum parameters take `EnumType|int`.

### Name transforms

* Wrapper methods drop the `gl` prefix: `glClearColor` → `GL::clearColor()`.
* Helpers use the exact extension method name (`glClearColor()`, `glUseProgramNone()`).

## Wrapper surface (0.7.0)

| Class | Wraps | Methods |
|-------|-------|---------|
| `GL` | `Opengl\GL\GL` | full slice-1 draw API (state, immediate mode, buffers, textures, shaders/programs, draw) |

## Enums

| Enum | Purpose |
|------|---------|
| `ClearBufferMask` | `glClear` bitfield |
| `EnableCap` | `glEnable` / `glDisable` |
| `StringName` | `glGetString` |
| `GetPName` | `glGetIntegerv` |
| `PrimitiveMode` | `glBegin` / `glDrawArrays` |
| `MatrixMode` | `glMatrixMode` |
| `BufferTarget` / `BufferUsage` | buffer binds & uploads |
| `TextureTarget` / `TextureParameterName` / `TextureParameter` | texture state |
| `ShaderType` | `glCreateShader` |
| `ErrorCode` | `glGetError` values |

## Testing

```bash
composer install --ignore-platform-req=ext-opengl
./vendor/bin/pest
```

CI runs the same suite on PHP 8.3–8.5 (coverage uses the committed extension method snapshot when `ext-opengl` is not loaded).

## License

MIT — see [LICENSE](LICENSE).
