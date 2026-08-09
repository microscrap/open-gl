---
type: Orientation
title: Package (0.7)
description: "microscrap/open-gl 0.7.0 — OpenGL PHP wrappers over ext-opengl; no ServiceProvider."
resource: .
tags: [orientation, opengl, microscrap, bindings, 0.7]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Package name, version, PHP, autoload helpers
  - id: readme
    resource: README.md
    title: Package README
  - id: gl
    resource: src/GL.php
    title: GL wrapper class
  - id: agents
    resource: AGENTS.md
    title: Agent rules for this package
---

# What it is

Composer package `microscrap/open-gl` at **0.7.0** — PHP wrappers, enums, and helpers over the [**php-io-extensions/open-gl**](https://github.com/php-io-extensions/open-gl) extension (`ext-opengl`).[^composer][^readme]

| Field | Value |
|-------|-------|
| Name | `microscrap/open-gl` |
| Version | `0.7.0` |
| PHP | `^8.3`[^composer] |
| Namespace | `Microscrap\Bindings\OpenGL\` → `src/`[^composer] |
| Require | `ext-opengl` `^0.7.0`[^composer] |
| Homepage | Ecosystem docs overview (see [Ecosystem docs](ecosystem-docs.md))[^composer] |
| Discovery | **None** — no provider / Chassis registration in this package[^agents] |
| Role | Bindings layer only (helpers + static wrapper + enums)[^agents] |

Autoloads `src/Helpers/gl-*.php` global `gl*` functions (each guarded with `function_exists`).[^composer]

# What it is not

- Not `php-io-extensions/open-gl` (the native extension) — this package *wraps* that extension.
- Not a ScrapyardIO GFX / framebuffer package — do not invent GFX APIs or ServiceProviders here.[^agents]
- Not window/context creation — pair with `microscrap/glfw` or `microscrap/sdl3` (see [Pair with GLFW / SDL3](pairing-glfw-sdl3.md)).
- Not a ServiceProvider package — no Chassis/Core/Machine coupling.[^agents]

# Public surface (summary)

| Layer | Location | Role |
|-------|----------|------|
| Helpers | `src/Helpers/gl-*.php` | Exact C / extension names (`glClearColor`) |
| Wrapper | `src/GL.php` | Static API; drops `gl` prefix (`GL::clearColor`) |
| Enums | `src/Enums/*` | OpenGL SDK `GL_*` tokens as backed enums |
| DTOs | Extension types | `Opengl\GL\GlBuffer`, `GlTexture`, `GlShader`, `GlProgram` passed through |

# Related

| Topic | Concept |
|-------|---------|
| Call stack | [Helpers → GL → ext](../architecture/helpers-gl-ext.md) |
| Wrap rules | [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md) |
| Enums | [Enums from OpenGL SDK](../conventions/enums-from-sdk.md) |
| Tests | [Coverage drift guard](../conventions/coverage-drift.md) |
| Context peers | [Pair with GLFW / SDL3](pairing-glfw-sdl3.md) |
| Docs site | [Ecosystem docs](ecosystem-docs.md) |
| Extension | `php-io-extensions/open-gl` 0.7.0 |

[^composer]: Package name, version, PHP, autoload helpers
[^readme]: Package README
[^agents]: Agent rules for this package
