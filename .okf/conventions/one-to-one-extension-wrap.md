---
type: Convention
title: "1:1 extension wrap"
description: "Helpers delegate to GL; GL calls Opengl\\GL\\GL; extension DTOs pass through unchanged."
resource: src/
tags: [convention, bindings, opengl]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
  - id: readme
    resource: README.md
    title: Package README wrap description
  - id: gl
    resource: src/GL.php
    title: GL wrapper class
  - id: helpers-state
    resource: src/Helpers/gl-state.php
    title: Helper delegation example
---

# Rule

Match peer bindings packages (`microscrap/glfw`, `microscrap/ftdi`, `microscrap/posix`):[^agents][^readme]

1. Global helpers use exact extension method names (`glClearColor`).
2. Static wrapper drops the `gl` prefix (`GL::clearColor`).
3. Helpers never call the extension; only `Microscrap\Bindings\OpenGL\GL` does.[^helpers-state][^gl]
4. Token `#define`s from the OpenGL SDK live in backed enums — see [Enums from OpenGL SDK](enums-from-sdk.md).
5. Named objects remain `Opengl\GL\Gl*` DTOs (ftdi-style), not reinvented DataObjects.[^agents]
6. Coverage drift Pest tests guard wrapper + helper completeness — see [Coverage drift guard](coverage-drift.md).
7. No exceptions thrown from `src/`; prefer `is_null($var)` over `$var === null`.[^agents]

# Architecture link

Full call-stack diagram: [Helpers → GL → ext](../architecture/helpers-gl-ext.md).

[^agents]: Agent wrap rules
[^readme]: Package README wrap description
[^gl]: GL wrapper class
[^helpers-state]: Helper delegation example
