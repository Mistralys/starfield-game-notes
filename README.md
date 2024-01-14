# Starfield Game Notes

Starfield game notes, tips tricks and knowledge base

## Game Concepts

### Slow Leveling

How slow skills progress had me annoyed at first. I felt that some of the skill levels also had increasingly unrealistic requirements. However, once I finished a playthrough, I understood why. The game is built around the _New Game+_, as you continue to level up your character between playthroughs. That put a completely different perspective on things, and now I find myself enjoying the slower pace, focusing less on skills but still being happy when I can upgrade one.

### Learn to improve ships

My first space battles were quite frustrating in the starter ship. Even after buying a better ship later on, I was still getting my butt handed back to me by pirates and the like. Later on when I finished the Free Rangers story arc, they gave me the ranger ship. That was a revelation: Suddenly I won battles, and could even go against bigger enemies. The problem was not my skill at dlying ships, but the fact that all my ships were really bad.

What I learned from this experience:

- Boosting breaks missile locks.
- Don't use your entire boost, brake to cut it off mid-boost.
- Don't use the ship builder's upgrade feature, use the ship builder directly.
- Improve reactor, shield, thrusters and weapons as much as you can.
- Skill up your _Starship Design_ skill for access to better modules and weapons.
- Missiles are your friend: They have awesome range.
- Invest some time to increase your _Piloting_ skill to hire more crewmen for bonuses.

Mods can help:

- [StarUI - Ship Builder][] much improved UI for easier module comparisons.
- [Remove Reactor Class Requirement][] This is a light cheat, but makes everything so much easier.

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


[StarUI - Ship Builder]: https://www.nexusmods.com/starfield/mods/6402
[Remove Reactor Class Requirement]: https://www.nexusmods.com/starfield/mods/1482

