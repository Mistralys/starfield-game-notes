<?php

declare(strict_types=1);

namespace Mistralys\Starfield\Console;

use Mistralys\Starfield\ItemTypes\ItemTypeInfo;

class ItemEntry extends BaseEntryInfo
{
    private ItemTypeInfo $typeInfo;
    private bool $parsed = false;
    private string $itemName = '';
    private string $itemCode = '';
    private string $itemLabel = '';

    public function __construct(ItemTypeInfo $typeInfo, string $command)
    {
        $this->typeInfo = $typeInfo;

        parent::__construct($command);
    }

    public function getTypeID() : string
    {
        return $this->typeInfo->getID();
    }

    public function getTypeInfo() : ItemTypeInfo
    {
        return $this->typeInfo;
    }

    public function getItemName() : string
    {
        $this->parse();

        return $this->itemName;
    }

    public function getItemCode() : string
    {
        $this->parse();

        return $this->itemCode;
    }

    public function getItemLabel() : string
    {
        $this->parse();

        return $this->itemLabel;
    }

    /**
     * ## Examples
     *
     * ```
     * BH_02 (1D000DF0) 'BountyHunter (Outfit v2)'
     * ```
     * @return void
     */
    private function parse() : void
    {
        if($this->parsed === true) {
            return;
        }

        $this->parsed = true;

        preg_match('/([a-zA-Z0-9_\- ]+) \(([A-F0-9]+)\) \'(.+)\'/', $this->command, $matches);

        if(!empty($matches[1])) {
            $this->itemName = trim($matches[1]);
            $this->itemCode = trim($matches[2]);
            $this->itemLabel = trim($matches[3]);
        }
    }
}
