---
type: Reference
title: Ecosystem docs
description: "Published ScrapyardIO ecosystem docs for microscrap/open-gl 0.7.x."
resource: "https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview"
tags: [orientation, docs, ecosystem, 0.7]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T02:20:00Z" }
status: draft
sources:
  - id: composer-homepage
    resource: composer.json
    title: composer.json homepage field
  - id: overview
    resource: "https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview"
    title: Ecosystem overview page
---

# Entrypoint

Human-facing package docs live on the ScrapyardIO ecosystem site:[^overview]

[https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview)

`composer.json` `homepage` points at that overview.[^composer-homepage]

# How agents should use it

- Prefer this OKF bundle for **in-repo** agent rules (wrap layer, traps, tests).
- Prefer the ecosystem site for **published** narrative docs aimed at humans.
- When either drifts from `src/` or Pest guards, update the stale side and note it in [log.md](../log.md).

# Related

* [Package (0.7)](package.md)

[^composer-homepage]: composer.json homepage field
[^overview]: Ecosystem overview page
