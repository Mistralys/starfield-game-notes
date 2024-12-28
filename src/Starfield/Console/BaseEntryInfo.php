<?php

declare(strict_types=1);

namespace Mistralys\Starfield\Console;

use AppUtils\ConvertHelper;
use Mistralys\Starfield\ItemTypes\ItemTypeCollection;

abstract class BaseEntryInfo implements ConsoleEntryInterface
{
    protected string $command;
    private ?string $id = null;

    public function __construct(string $command)
    {
        $this->command = $command;
    }

    final public function getID() : string
    {
        if(!isset($this->id)) {
            $this->id = md5($this->command);
        }

        return $this->id;
    }

    public static function parseLine(string $line) : ?BaseEntryInfo
    {
        $parts = ConvertHelper::explodeTrim(':', $line);
        if(count($parts) < 2) {
            return null;
        }

        $typeID = strtoupper($parts[0]);
        $types = ItemTypeCollection::getInstance();
        if($types->idExists($typeID)) {
            return new ItemEntry($types->getByID($typeID), $parts[1]);
        }

        return new MiscEntry($line);
    }
}
