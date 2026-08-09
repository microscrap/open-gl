---
type: Orientation
title: "Pair with GLFW / SDL3"
description: "Create windows/contexts with microscrap/glfw or microscrap/sdl3; this package only issues GL calls."
resource: .
tags: [orientation, glfw, sdl3, context, composition]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Package README (requirements and glfw note)
  - id: package-orient
    resource: "/orientation/package.md"
    title: Package orientation concept
---

# Composition boundary

`microscrap/open-gl` is **bindings only**. It does not create windows, surfaces, or OpenGL contexts.[^readme]

| Concern | Package |
|---------|---------|
| OpenGL draw / state API | `microscrap/open-gl` (this package) |
| GLFW window + context | `microscrap/glfw` |
| SDL3 window + GL context | `microscrap/sdl3` |
| GFX / framebuffer registration | out of scope here (do not invent in this package) |

# Typical flow

1. Depend on a context peer (`microscrap/glfw` or `microscrap/sdl3`) plus this package.
2. Create a window and make an OpenGL context current via the peer.
3. Call helpers (`glClear`, …) or `Microscrap\Bindings\OpenGL\GL::*`.
4. Swap / present via the peer API — not via this package.

# Caveats

- Without a current context, GL calls fail or are undefined at the native layer — see [Need current GL context](../traps/need-current-gl-context.md).
- `microscrap/glfw` may define a small overlapping set of `gl*` helpers; load order matters — see [`function_exists` load order](../traps/function-exists-load-order.md).[^readme]

# Related

* [Package (0.7)](package.md)
* [Need current GL context](../traps/need-current-gl-context.md)
* [`function_exists` load order](../traps/function-exists-load-order.md)

[^readme]: Package README (requirements and glfw note)
