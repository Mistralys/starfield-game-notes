<?php

declare(strict_types=1);

namespace Mistralys\Starfield\Console;

use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use Mistralys\Starfield\ItemTypes\ItemTypeCollection;

/**
 *
 * @method ItemEntry getByID(string $id)
 * @method ItemEntry[] getAll()
 * @method ItemEntry getDefault()
 * @property array<string,ItemEntry> $items
 */
class ItemEntryStack extends BaseStringPrimaryCollection
{
    /**
     * @var ItemEntry[]
     */
    private array $tempItems;
    private string $defaultID;

    /**
     * @param ItemEntry[] $items
     */
    public function __construct(array $items)
    {
        $this->tempItems = $items;

        if(!empty($items)) {
            $this->defaultID = $items[0]->getID();
        }
    }

    protected function registerItems(): void
    {
        foreach($this->tempItems as $item) {
            $this->registerItem($item);
        }

        $this->tempItems = array();
    }

    /**
     * @param ItemEntry $a
     * @param ItemEntry $b
     * @return int
     */
    protected function sortItems(StringPrimaryRecordInterface $a, StringPrimaryRecordInterface $b) : int
    {
        return strnatcasecmp($a->getItemLabel(), $b->getItemLabel());
    }

    public function getDefaultID(): string
    {
        return $this->defaultID;
    }

    /**
     * Get all items of the specified types.
     * @param string[] $types {@see ItemTypeCollection::TYPE_ARMOR} for example.
     * @return ItemEntry[]
     */
    public function getByTypes(array $types) : array
    {
        $result = array();

        foreach($this->getAll() as $item) {
            if(in_array($item->getTypeID(), $types)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    public function findByName(string $name) : ?ItemEntry
    {
        foreach($this->getAll() as $item) {
            if($item->getItemName() === $name) {
                return $item;
            }
        }

        return null;
    }

    public function findByCode(string $code) : ?ItemEntry
    {
        foreach($this->getAll() as $item) {
            if($item->getItemCode() === $code) {
                return $item;
            }
        }

        return null;
    }
}
