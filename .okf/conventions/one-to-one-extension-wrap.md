---
type: Convention
title: 1:1 extension wrap
description: Helpers delegate to GL; GL calls Opengl\GL\GL; enums from OpenGL SDK tokens.
resource: src/
tags: [convention, bindings, opengl]
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T02:00:00Z" }
status: draft
---

# Rule

Match `microscrap/glfw` / `microscrap/ftdi` / `microscrap/posix`:

1. Global helpers use exact extension method names (`glClearColor`).
2. Static wrapper drops the `gl` prefix (`GL::clearColor`).
3. Helpers never call the extension; only `Microscrap\Bindings\OpenGL\GL` does.
4. Token `#define`s from the OpenGL SDK live in backed enums (`ClearBufferMask`, …), not class constants.
5. Named objects remain `Opengl\GL\Gl*` DTOs (ftdi-style), not reinvented DataObjects.
6. Coverage drift Pest tests guard wrapper + helper completeness against the extension method list.
