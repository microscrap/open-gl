# AGENTS.md — microscrap/open-gl

Read `.okf/index.md` before changing this package.

## Role

Bindings-only Composer package over **ext-opengl** (`php-io-extensions/open-gl`). No GFX/framebuffer, no ServiceProvider.

## Rules

* Helpers call `Microscrap\Bindings\OpenGL\GL` only; `GL` calls `Opengl\GL\GL` only.
* Keep 1:1 coverage with the extension; update `tests/Support/extension-methods-0.7.0.php` when the extension grows.
* Token constants live in `src/Enums/*` as backed enums with **FULLY UPPERCASE** cases.
* Prefer `is_null($var)` over `$var === null`.
* No class-level constants; no exceptions thrown from `src/`.
* Extension DTOs (`GlBuffer`, …) are public API — do not invent parallel DataObjects unless macOS case-collision forces it.
