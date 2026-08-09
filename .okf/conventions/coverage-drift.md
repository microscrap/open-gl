---
type: Convention
title: Coverage drift guard
description: "Pest CoverageDrift, StyleAudit, and EnumTokens keep the wrap complete and stylistically honest."
resource: tests/Unit/
tags: [convention, tests, coverage, pest]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: coverage-drift
    resource: tests/Unit/CoverageDriftTest.php
    title: CoverageDrift Pest test
  - id: coverage-map
    resource: tests/Support/CoverageMap.php
    title: Wrapper/extension class pairs
  - id: snapshot
    resource: tests/Support/extension-methods-0.7.0.php
    title: Committed 0.7.0 extension method snapshot
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit Pest test
  - id: enum-tokens
    resource: tests/Unit/EnumTokensTest.php
    title: EnumTokens Pest test
  - id: agents
    resource: AGENTS.md
    title: Coverage update rule
  - id: readme
    resource: README.md
    title: Coverage drift highlight
---

# Purpose

When **ext-opengl** gains methods, this package must grow matching wrapper methods and helpers. A Pest suite fails if coverage drifts.[^readme][^coverage-drift]

# CoverageDrift

`tests/Unit/CoverageDriftTest.php`:[^coverage-drift]

1. Loads extension methods from the live `opengl` extension when available; otherwise from `tests/Support/extension-methods-0.7.0.php`.[^snapshot]
2. For each `[wrapperClass, extensionClass]` in `tests/Support/CoverageMap.php`, asserts:[^coverage-map]
   - every extension method has a wrapper method (via `NameTransform::wrapperMethod`)
   - every extension method has a global helper (`function_exists`)
3. Asserts the stub snapshot keys stay in sync with the coverage map.

Current map pair: `Microscrap\Bindings\OpenGL\GL` ↔ `Opengl\GL\GL`.[^coverage-map]

When the extension grows: update the wrap **and** refresh `tests/Support/extension-methods-0.7.0.php`.[^agents]

# StyleAudit

`tests/Unit/StyleAuditTest.php` enforces package style on `src/`:[^style-audit]

- no class constants (`T_CONST`)
- no `throw`
- every helper guarded by `function_exists`
- every enum is backed

# EnumTokens

`tests/Unit/EnumTokensTest.php` asserts selected enum case values match OpenGL SDK / `gl.h` hex tokens.[^enum-tokens]

# Related

* [Helpers → GL → ext](../architecture/helpers-gl-ext.md)
* [Enums from OpenGL SDK](enums-from-sdk.md)
* [1:1 extension wrap](one-to-one-extension-wrap.md)

[^coverage-drift]: CoverageDrift Pest test
[^coverage-map]: Wrapper/extension class pairs
[^snapshot]: Committed 0.7.0 extension method snapshot
[^style-audit]: StyleAudit Pest test
[^enum-tokens]: EnumTokens Pest test
[^agents]: Coverage update rule
[^readme]: Coverage drift highlight
