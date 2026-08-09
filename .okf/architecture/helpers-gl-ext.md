---
type: Architecture
title: "Helpers → GL → ext"
description: "Global helpers delegate to GL; only GL calls Opengl\\GL\\GL. Name transforms and DTO passthrough."
resource: src/
tags: [architecture, bindings, opengl, helpers]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: gl
    resource: src/GL.php
    title: Static wrapper class
  - id: helpers-state
    resource: src/Helpers/gl-state.php
    title: Sample helper file with function_exists guards
  - id: composer
    resource: composer.json
    title: Autoload files list for helpers
  - id: readme
    resource: README.md
    title: Two calling styles and name transforms
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
---

# Call stack

```
app / tests
    │
    ├─ glClearColor(...)          # global helpers (exact extension names)
    │       └─► GL::clearColor()  # Microscrap\Bindings\OpenGL\GL
    │               └─► Opengl\GL\GL::glClearColor(...)
    │
    └─ GL::clearColor(...)        # OO-ish static style (same path into ext)
            └─► Opengl\GL\GL::glClearColor(...)
```

Rules:[^agents][^readme]

1. Helpers call `Microscrap\Bindings\OpenGL\GL` only.
2. `GL` is the only layer that calls `Opengl\GL\GL`.
3. Helpers never touch the extension class directly.

# Name transforms

| Style | Example | Rule |
|-------|---------|------|
| Helper | `glClearColor()` | Exact extension method name[^readme] |
| Wrapper | `GL::clearColor()` | Drop leading `gl`[^readme][^gl] |
| Extension | `Opengl\GL\GL::glClearColor()` | Native extension API |

# Autoload

Composer `autoload.files` registers helper modules:[^composer]

- `src/Helpers/gl-state.php`
- `src/Helpers/gl-immediate.php`
- `src/Helpers/gl-buffer.php`
- `src/Helpers/gl-texture.php`
- `src/Helpers/gl-shader.php`
- `src/Helpers/gl-draw.php`

Each function is wrapped in `if (! function_exists(...))` so a prior definition wins.[^helpers-state]

# Objects and errors

- Named objects remain extension DTOs (`GlBuffer`, `GlTexture`, `GlShader`, `GlProgram`) with public `fd` — passed through, not re-wrapped as package DataObjects.[^gl][^readme]
- Flag parameters accept `EnumType|int`; wrapper unwraps via enum `value`.[^gl]
- C-style errors: no exceptions from `src/`; use `glGetError()` / `GL::getError()`.[^readme]

# Related

* [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md)
* [Enums from OpenGL SDK](../conventions/enums-from-sdk.md)
* [Coverage drift guard](../conventions/coverage-drift.md)
* [`function_exists` load order](../traps/function-exists-load-order.md)

[^gl]: Static wrapper class
[^helpers-state]: Sample helper file with function_exists guards
[^composer]: Autoload files list for helpers
[^readme]: Two calling styles and name transforms
[^agents]: Agent wrap rules
