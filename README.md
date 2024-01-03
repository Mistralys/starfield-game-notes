# Starfield Game Notes

Starfield game notes, tips tricks and knowledge base

## Game Concepts

### Farming

1. Get the Botany perk
2. On a planet, scan a plant to 100%.
3. Build an outpost on the same planet.
4. Build the Greenhouse (in the Extractors tab)
5. Connect required resources to the greenhouse (for ex. Water)

> The existing Hydroponics Hab module is cosmetic only.
> It serves no specific function. 

## Console Commands

### Increase max ships in fleet

Increase the maximum number of ships in your fleet:

``` 
SetGS uSpaceshipMaximumOwnedSpaceships 50
```

> This must be repeated in every game session.

### Add perk points

This will add `4` perk points:

```
CGF "Game.AddPerkPoints" 4
```

### Add a perk

This will add a level of the _Gymnastics_ perk:

```
player.addperk 28AE29
```

See the [list of perk item codes](item-codes/skills.md).

### Increase carry weight

This increases the carry weight permanently:

```
player.modav carryweight 9000
```

### Increase walk speed

Increase walking and running speed permanently (in percent):

```
player.modav speedmult 200
```

### Give an item

This adds 20 med packs:

```
player.additem ABF9 20
```

> The zeros at the beginning of the code can be omitted.
> They are also case-insensitive.

#### Item codes

A selection of the most useful item codes:

- [Aid](item-codes/aid.md)
- [Ammo](item-codes/ammo.md)
- [Extractable resources](item-codes/extractable-resources.md)
- [Crafting materials](item-codes/materials.md)
