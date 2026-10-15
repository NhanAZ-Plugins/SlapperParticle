# SlapperParticle

SlapperParticle displays two orbiting white dust particles around each Slapper human entity in every loaded world.

## Requirements

- Axolotl-PM with server API 5.0.0 as the minimum.
- The [Slapper plugin](https://github.com/ReinfyTeam/Slapper), which provides the human entities used by this plugin.

The manifest declares API 5.0.0 as the minimum. CI checks PHPStan and builds against pinned API 5.0.0 and 5.49.2 sources; it does not claim every API 5.x revision has been tested. See the [build workflow](.github/workflows/build.yml) for the exact source revisions used by each run.

## Build

The [build workflow](.github/workflows/build.yml) runs PHP syntax and orbit tests, PHPStan at its maximum level, and builds and inspects the plugin PHAR with [DevTools](https://github.com/NhanAZ/DevTools). Its runtime smoke test starts the built artifact with the pinned Slapper dependency on an isolated Axolotl-PM server.

## Source and reuse

The original source commit is attributed to NhanAZ in this repository's Git history. This repository does not declare a separate license; publication of a release does not grant permission to reuse the source outside the rights holder's authorization.
