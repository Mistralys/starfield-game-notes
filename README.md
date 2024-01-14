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

### Selling and buying

The following is a spreadsheet with all known shops and the type of 
wares they sell, to quickly find places to sell and buy things.

https://docs.google.com/spreadsheets/d/126SnzkduhmUHLUkY5SXfRyF6x9AmrTtTbe5SPMTeEtY/edit?usp=sharing

#### Selling ships

Took me a while to find: Go to a spaceport technician and ask him
to show you the ships he has to sell. In this view, there is a key
to switch into sell mode, like in other shops.

#### Selling Contraband

This is best in systems where there is no police. There are two
good locations for this:

- _The Den_ (Station, Wolf System)  
  In the Trade Authority shop
- _The Key_ (Station, Kryx System)  
  Several shops available, but only during the Crimson Fleet mission arc

## Useful Console Commands

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

- Money `F`
- Digipicks `A`

- [Aid](item-codes/aid.md)
- [Ammo](item-codes/ammo.md)
- [Extractable resources](item-codes/extractable-resources.md)
- [Crafting materials](item-codes/materials.md)
