# Starfield game notes

## Some useful commands

Permanently set the weight that the player can carry:

```
player.modav carryweight 2000
```

Permanently set the multiplier for movement, in percent
(100 = normal speed, 200 = double speed). 

```
player.modav speedmult 200
```

Add skill points: 

```
CGF "Game.AddPerkPoints" 2
```


## Dropping many items at once

One quick way is to use the "Transfer all from category" feature and the [Galactic Junk Recycler][].

1. Open the target category, e.g. "Apparel".
2. Move all items you wish to keep into a container.
3. Go to a workbench, open the recycling menu with `R`.
4. Press `T` to move everything over.

As an added benefit, any items that are supported by the recycling mod will be converted
into resources.

> NOTE: Alternatively, you can do the same selling things to a vendor.
> However, this works only as long as the vendor still has enough money
> to buy the items. It will stop automatically when they have none left.

[Galactic Junk Recycler]: https://creations.bethesda.net/fr/starfield/details/bb536404-9aed-4549-9e7d-1f0820e80103/Galactic_Junk_Recycler

## Modding: Vortex, Creations, both?

Personally, I have no issues modding with both Vortex and using Creations.
The biggest challenge is keeping track of what you have installed so you
can make sure not to install the same mod both ways.

There are quite a few mods that are available only on Creations, so combining
the two is the only way to get both.

### Load order

In Vortex, the Load Order screen will mark official DLCs and Creations as 
"Not managed by Vortex". Still, you can sort the list using LOOT and the 
game will use that order, as long as you don't go changing the order in-game.

Typically, if you add new creations, a good practice is to quit the game 
afterwards, sort the load order, then run the game again.

## Bugs

### Bug: NPCs with black clothing / armor

This means that the textures have not been loaded correctly. This can 
happen on several occasions, including after a longer gaming session.
To fix it, it is often enough to go back to the main menu and to reload
the save game. If that does not help, restart the game entirely.

> NOTE: It happened consistently when I was affected by [the mod resetting bug](#bug-enabled-mods-resetting-on-game-load).
> This supports the theory I often read online that changing the load
> order or adding mods will cause the game to glitch loading textures.

### Bug: Enabled mods resetting on game load

I ran into this issue where the game would disable / deselect all mods on
game start. I had to go into the creations menu and enable them all again
before loading a save game to fix it manually.

It turned out that it was caused by this line in my `StarfieldCustom.ini`:

```ini
[General]
sTestFile1=Modname.esp
```

I had added that line recently because a mod I installed included this in
its installation instructions. f a mod tells you to add this, don't -
it's not necessary anymore. It was the old way ol loading mods, and adding
it today messes up the loading.
