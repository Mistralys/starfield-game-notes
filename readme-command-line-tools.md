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

> NOTE: To see the paths to all relevant files and folders, run
> `php bin/show-paths.php`.

### Use a help command file

Ideally, add a bat file that contains the help commands for the mods that you use.

What I currently use is in the file [help-commands.txt](bin/help-commands.txt).
