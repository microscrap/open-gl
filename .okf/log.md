# Log

## 2026-08-09

* Initial package scaffold for `microscrap/open-gl` 0.7.0 wrapping `ext-opengl` 0.7.0.
* Pattern cloned from `microscrap/glfw` (helpers + static wrapper + coverage guard) and `microscrap/ftdi` (extension DTOs + enums).
* Enum token values taken from OpenGL SDK / `gl.h` for the slice-1 API surface only.
* Explore report: no separate `sdk` Composer package; prefer vulkan `fromExt`/`toExt` DataObjects for Gl* — pending Angel verify before adding; StyleAuditTest added (sdl3).
* Ecosystem docs registered on Herd website: `/ecosystem/microscrap/open-gl/0.7.x` (8 pages + manifest sort 10).
