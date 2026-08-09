---
type: Trap
title: Need current GL context
description: "Bindings issue GL calls only; without a current context from GLFW/SDL3 (or similar), native calls fail."
resource: .
tags: [trap, context, glfw, sdl3, opengl]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Package README (bindings-only role)
  - id: package-orient
    resource: "/orientation/package.md"
    title: Package orientation (not window/context)
  - id: pairing
    resource: "/orientation/pairing-glfw-sdl3.md"
    title: Pairing concept
---

# Symptom

`gl*` / `GL::*` calls error, return nonsense, or crash when run in a bare PHP CLI process with only `microscrap/open-gl` (and `ext-opengl`) loaded.

# Cause

This package wraps the extension's draw/state API. It does **not** create an OpenGL context or window.[^readme][^package-orient] OpenGL requires a current context on the calling thread before most entry points are valid.

# Mitigation

1. Use `microscrap/glfw` or `microscrap/sdl3` (or another context provider) to create a window/context and make it current.
2. Then call helpers or `GL::*`.
3. Do not invent ServiceProviders or GFX registration inside this package to “fix” missing context.[^package-orient]

See [Pair with GLFW / SDL3](../orientation/pairing-glfw-sdl3.md).[^pairing]

# Related

* [Pair with GLFW / SDL3](../orientation/pairing-glfw-sdl3.md)
* [Package (0.7)](../orientation/package.md)

[^readme]: Package README (bindings-only role)
[^package-orient]: Package orientation (not window/context)
[^pairing]: Pairing concept
