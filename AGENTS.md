# AGENTS.md — microscrap/open-gl

**Always read `.okf/index.md` first** before changing this package. Open only the concepts needed for the task; prefer `status: stable` when present. When you learn a durable package fact, update `.okf/` and append `.okf/log.md`.

## Role

Bindings-only Composer package over **ext-opengl** (`php-io-extensions/open-gl`). No GFX/framebuffer, no ServiceProvider.

## Rules

* Helpers call `Microscrap\Bindings\OpenGL\GL` only; `GL` calls `Opengl\GL\GL` only.
* Keep 1:1 coverage with the extension; update `tests/Support/extension-methods-0.7.0.php` when the extension grows.
* Token constants live in `src/Enums/*` as backed enums with **FULLY UPPERCASE** cases.
* Prefer `is_null($var)` over `$var === null`.
* No class-level constants; no exceptions thrown from `src/`.
* Extension DTOs (`GlBuffer`, …) are public API — do not invent parallel DataObjects unless macOS case-collision forces it.

## Quick OKF map

| Need | Concept |
|------|---------|
| Identity / scope | `.okf/orientation/package.md` |
| Call stack | `.okf/architecture/helpers-gl-ext.md` |
| Enums | `.okf/conventions/enums-from-sdk.md` |
| Tests | `.okf/conventions/coverage-drift.md` |
| Context peers | `.okf/orientation/pairing-glfw-sdl3.md` |
| glfw helper clash | `.okf/traps/function-exists-load-order.md` |
