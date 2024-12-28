<?php

declare(strict_types=1);

namespace Mistralys\Starfield\Console;

use AppUtils\Collections\BaseStringPrimaryCollection;

/**
 * @method ConsoleEntryInterface getByID(string $id)
 * @method ConsoleEntryInterface[] getAll()
 * @method ConsoleEntryInterface getDefault()
 */
class CommandStack extends BaseStringPrimaryCollection
{
    /**
     * @var ConsoleEntryInterface[]
     */
    private array $tempEntries;
    private string $defaultID;

    public function getDefaultID(): string
    {
        return $this->defaultID;
    }

    /**
     * @param ConsoleEntryInterface[] $entries
     */
    public function __construct(array $entries)
    {
        $this->tempEntries = $entries;

        if(!empty($entries)) {
            $this->defaultID = $entries[0]->getID();
        }
    }

    protected function registerItems(): void
    {
        foreach ($this->tempEntries as $entry) {
            $this->registerItem($entry);
        }

        $this->tempEntries = array();
    }

    private ?ItemEntryStack $itemEntries = null;

    /**
     * @return ItemEntryStack
     */
    public function getItemEntries() : ItemEntryStack
    {
        if($this->itemEntries === null) {
            $this->itemEntries = new ItemEntryStack($this->getItemEntriesRaw());
        }

        return $this->itemEntries;
    }

    /**
     * @return ItemEntry[]
     */
    private function getItemEntriesRaw() : array
    {
        $items = array();

        foreach($this->getAll() as $entry)
        {
            if($entry instanceof ItemEntry)
            {
                $items[] = $entry;
            }
        }

        return $items;
    }
}