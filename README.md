# SlapperParticle

SlapperParticle is an archived PocketMine-MP plugin that draws white particles around entities from the historical Slapper plugin.

## Compatibility

The manifest declares PocketMine-MP API `1.0.0`. The source imports the old `PluginTask`, `pocketmine\level\particle` and `slapper\entities\SlapperHuman` classes. It has not been ported to Axolotl-PM 5 or tested on a current server. Do not install this source on a production Axolotl-PM server.

## Historical behavior

The plugin scans loaded levels for Slapper human entities and schedules a repeating particle task. It has no commands or configuration. The Slapper dependency is visible in source but is not declared in `plugin.yml`, so the plugin can fail to load or run when that dependency is unavailable.

## Development status

This repository has no CI build, DevTools PHAR, runtime test or release verified for Axolotl-PM 5. A port would need a maintained Slapper equivalent, updated particle and scheduler APIs, an explicit dependency declaration and runtime testing before any compatibility claim.

No license file is present in this repository. The absence of a license should be resolved with the rights holder before redistributing a modified build. The historical author information is limited to the source and repository history.

For questions about the NhanAZ ecosystem, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
