---
okf_version: "0.2"
---

# microscrap/open-gl Knowledge Bundle

Package knowledge for `microscrap/open-gl` (OpenGL bindings over **ext-opengl**, v0.7.0).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document the wrappers-only bindings package. Do **not** invent ServiceProviders, Framebuffers, or GFX registration here — those belong in `microscrap/*-gfx` / tubes.
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

* [Package (0.7)](orientation/package.md) - Composer identity, namespace, wrappers over ext-opengl.
* [Ecosystem docs](orientation/ecosystem-docs.md) - Published 0.7.x overview and docs site entrypoint.
* [Pair with GLFW / SDL3](orientation/pairing-glfw-sdl3.md) - Window/context from peers; GL calls need a current context.

# Architecture

* [Helpers → GL → ext](architecture/helpers-gl-ext.md) - Call stack and name transforms for the bindings layer.

# Conventions

* [1:1 extension wrap](conventions/one-to-one-extension-wrap.md) - Helpers → wrapper → extension; DTO passthrough.
* [Enums from OpenGL SDK](conventions/enums-from-sdk.md) - `GL_*` tokens as int-backed enums; no class constants.
* [Coverage drift guard](conventions/coverage-drift.md) - Pest CoverageDrift / StyleAudit / EnumTokens keep wrap complete.

# Traps

* [`function_exists` load order](traps/function-exists-load-order.md) - Overlap with `microscrap/glfw` gl* helpers; first definition wins.
* [Need current GL context](traps/need-current-gl-context.md) - This package does not create contexts; calls fail without one.

# Log

* [Directory update log](log.md)
