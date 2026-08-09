---
type: Orientation
title: Package (0.7)
description: microscrap/open-gl 0.7.0 — OpenGL PHP wrappers over ext-opengl; no ServiceProvider.
resource: .
tags: [orientation, opengl, microscrap, bindings, 0.7]
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T02:00:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Package name, version, PHP, autoload helpers
  - id: gl
    resource: src/GL.php
    title: GL wrapper class
---

# What it is

Composer package `microscrap/open-gl` at **0.7.0** — PHP wrappers, enums, and helpers over the [**php-io-extensions/open-gl**](https://github.com/php-io-extensions/open-gl) extension (`ext-opengl`).[^composer]

| Field | Value |
|-------|-------|
| Name | `microscrap/open-gl` |
| Version | `0.7.0` |
| PHP | `^8.3`[^composer] |
| Namespace | `Microscrap\Bindings\OpenGL\` → `src/`[^composer] |
| Discovery | **None** — no `extra.scrapyard-io.providers` |
| Role | Bindings layer only (helpers + static wrapper + enums) |

Requires `ext-opengl` `^0.7.0`. Autoloads `src/Helpers/gl-*.php` global `gl*` functions (guarded with `function_exists`).

# What it is not

- Not `php-io-extensions/open-gl` (the native extension) — this package *wraps* that extension.
- Not a ScrapyardIO GFX / framebuffer package — see future `microscrap/open-gl-gfx` / peers.
- Not window/context creation — pair with `microscrap/glfw` or `microscrap/sdl3`.
- Not a ServiceProvider package — no Chassis/Core/Machine coupling.

# Related

| Topic | Concept |
|-------|---------|
| Wrap rules | [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md) |
| Extension | `php-io-extensions/open-gl` 0.7.0 |
| Exemplars | `microscrap/glfw`, `microscrap/ftdi`, `microscrap/posix`, `microscrap/mpsse` |

[^composer]: Package name, version, PHP, autoload helpers
