# Starfield Command Line Tools

## Requirements

- PHP 8.0 or later
- [Composer](https://getcomposer.org/)
- [Starfield](https://store.steampowered.com/app/1716740/Starfield/)

## Installation

1. Clone this repository.
2. Run `composer install`.
3. Copy `config.dist.php` to `config.php`.
4. Adjust the values in the configuration file as needed.

## Generate add item commands

This tool can generate a bat command file to add multiple items to your inventory 
in Starfield, without having to manually type them all. 

Because item codes are save-specific, the tool works by extracting the relevant
codes from a log file of the console command output. The `help` command is used
to determine the item codes.

> Example: The description of the mod [Bounty Hunter Outfit](https://www.nexusmods.com/starfield/mods/7915)
> states that executing `help BH` in the console will display the item codes.

1. Install the mod [Console Output To File](https://www.nexusmods.com/starfield/mods/3142).
2. Launch Starfield, load your save.
3. Open the console, and execute `help` commands for all the items you wish to add.
4. Run `php bin/generate_add_item_commands.php`.
5. Optional: Edit the generated bat file to remove any unwanted items.
6. Open the console and execute the `bat` command shown.

> NOTE: The console log file is typically located in the game install folder
> under `Data/SFSE/Plugins/sfse_plugin_console.log`.

### Use a help command file

Ideally, add a bat file that contains the help commands for the mods that you use.

This is what I currently use:

```
; -----------------------------------------------------------------
; ZoNE79's Clothing Pack
; https://www.nexusmods.com/starfield/mods/11255
help "BH_" 4 ARMO ; Bounty Hunter Outfit https://www.nexusmods.com/starfield/mods/7915
help "GlowingEyes_" 4 ARMO ; Glowing Eyes https://www.nexusmods.com/starfield/mods/9044
help "CyberOps " 4 ARMO ; Cyber Ops Outfit https://www.nexusmods.com/starfield/mods/8158
help "Gadgets " 4 ARMO ; Starfield Gadgets https://www.nexusmods.com/starfield/mods/8112
help "Robotics_" 4 ARMO ; Robotics Outfit https://www.nexusmods.com/starfield/mods/6632

; -----------------------------------------------------------------
; New Sarees
; https://www.nexusmods.com/starfield/mods/8681
help "Clothes_Dress_Sari" 4 ARMO 

; -----------------------------------------------------------------
; KZ's Aggregation of Scraps
; https://www.nexusmods.com/starfield/mods/11471
help "KZ_" 4 ARMO

; -----------------------------------------------------------------
; Female Nanosuit
; https://www.nexusmods.com/starfield/mods/7161
help "Nanosuit_" 4 ARMO
```