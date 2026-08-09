---
type: Trap
title: "`function_exists` load order"
description: "Helpers skip definition when the name exists; microscrap/glfw may win if loaded first."
resource: src/Helpers/
tags: [trap, autoload, glfw, helpers]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: README note on glfw helper overlap
  - id: helpers-state
    resource: src/Helpers/gl-state.php
    title: function_exists guard pattern
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit requires function_exists guards
---

# Symptom

A subset of `gl*` calls behave like GLFW's visual-proof helpers (or otherwise not like this package's wrap) even though `microscrap/open-gl` is installed.

# Cause

Every helper is defined only when the name is free:[^helpers-state]

```php
if (! function_exists('glClearColor')) {
    function glClearColor(...): void
    {
        GL::clearColor(...);
    }
}
```

`microscrap/glfw` also defines a small subset of `gl*` helpers for visual proofs. Under the guard, **whichever package's autoload files run first keeps the definition**.[^readme]

# Mitigation

- Prefer this package as the **canonical** OpenGL binding.[^readme]
- Control Composer autoload / require order so `microscrap/open-gl` helpers register before overlapping GLFW helpers when both are present.
- Prefer `Microscrap\Bindings\OpenGL\GL::*` static calls when you must avoid global-name collisions entirely.

# Related

* [Pair with GLFW / SDL3](../orientation/pairing-glfw-sdl3.md)
* [Helpers → GL → ext](../architecture/helpers-gl-ext.md)

[^readme]: README note on glfw helper overlap
[^helpers-state]: function_exists guard pattern
[^style-audit]: StyleAudit requires function_exists guards
