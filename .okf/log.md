# Log

## 2026-08-09

* **Expansion**: Regenerated OKF v0.2 bundle for `microscrap/open-gl` 0.7.0 from package sources + `okf/SPEC.md` (GoogleCloudPlatform/knowledge-catalog).
* **Update**: Enriched [Package (0.7)](/orientation/package.md) and [1:1 extension wrap](/conventions/one-to-one-extension-wrap.md); rewired root [index.md](/index.md).
* **Creation**: [Helpers → GL → ext](/architecture/helpers-gl-ext.md), [Enums from OpenGL SDK](/conventions/enums-from-sdk.md), [Coverage drift guard](/conventions/coverage-drift.md), [Ecosystem docs](/orientation/ecosystem-docs.md), [Pair with GLFW / SDL3](/orientation/pairing-glfw-sdl3.md).
* **Creation**: Traps — [`function_exists` load order](/traps/function-exists-load-order.md), [Need current GL context](/traps/need-current-gl-context.md).
* **Creation**: Subdirectory indexes under `orientation/`, `architecture/`, `conventions/`, `traps/`.
* **Update**: Root `AGENTS.md` — stronger “read `.okf/index.md` first” + quick concept map.
* Initial package scaffold for `microscrap/open-gl` 0.7.0 wrapping `ext-opengl` 0.7.0.
* Pattern cloned from `microscrap/glfw` (helpers + static wrapper + coverage guard) and `microscrap/ftdi` (extension DTOs + enums).
* Enum token values taken from OpenGL SDK / `gl.h` for the slice-1 API surface only.
* Explore report: no separate `sdk` Composer package; prefer vulkan `fromExt`/`toExt` DataObjects for Gl* — pending Angel verify before adding; StyleAuditTest added (sdl3).
* Ecosystem docs registered on Herd website: `/ecosystem/microscrap/open-gl/0.7.x` (8 pages + manifest sort 10).
* Expanded OKF bundle (architecture, enums, coverage-drift, pairing, traps) + README prod docs link + badges + GitHub Actions Pest CI (PHP 8.3–8.5, ignore-platform-req=ext-opengl).
