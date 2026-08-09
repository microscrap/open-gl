---
type: Convention
title: Enums from OpenGL SDK
description: "GL_* tokens live as int-backed PHP enums with FULLY UPPERCASE cases; extension does not expose them."
resource: src/Enums/
tags: [convention, enums, opengl, sdk]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Enums table and SDK note
  - id: clear-mask
    resource: src/Enums/ClearBufferMask.php
    title: ClearBufferMask enum example
  - id: enum-tokens
    resource: tests/Unit/EnumTokensTest.php
    title: EnumTokens Pest assertions
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit backed-enum / no-class-const checks
  - id: agents
    resource: AGENTS.md
    title: Enum case naming rule
---

# Why enums live here

The native **ext-opengl** slice exposes draw/state methods but **not** the OpenGL SDK token constants (`GL_COLOR_BUFFER_BIT`, …). This package transcribes those tokens as PHP enums for the wrapped API surface.[^readme]

# Rules

- Use **int-backed** enums under `Microscrap\Bindings\OpenGL\Enums\`.[^clear-mask]
- Case names are **FULLY UPPERCASE** and keep the `GL_` prefix (e.g. `ClearBufferMask::GL_COLOR_BUFFER_BIT`).[^agents][^clear-mask]
- No class-level constants in `src/` — StyleAudit fails on `T_CONST`.[^style-audit][^agents]
- Wrapper methods accept `EnumType|int` and unwrap with the enum's `value`.

# Enum inventory (0.7.0)

| Enum | Purpose |
|------|---------|
| `ClearBufferMask` | `glClear` bitfield |
| `EnableCap` | `glEnable` / `glDisable` |
| `StringName` | `glGetString` |
| `GetPName` | `glGetIntegerv` |
| `PrimitiveMode` | `glBegin` / `glDrawArrays` |
| `MatrixMode` | `glMatrixMode` |
| `BufferTarget` / `BufferUsage` | buffer binds & uploads |
| `TextureTarget` / `TextureParameterName` / `TextureParameter` | texture state |
| `ShaderType` | `glCreateShader` |
| `ErrorCode` | `glGetError` values |

Values are checked by [EnumTokens](coverage-drift.md) against known SDK hex constants.[^enum-tokens]

# Related

* [1:1 extension wrap](one-to-one-extension-wrap.md)
* [Coverage drift guard](coverage-drift.md)

[^readme]: Enums table and SDK note
[^clear-mask]: ClearBufferMask enum example
[^enum-tokens]: EnumTokens Pest assertions
[^style-audit]: StyleAudit backed-enum / no-class-const checks
[^agents]: Enum case naming rule
