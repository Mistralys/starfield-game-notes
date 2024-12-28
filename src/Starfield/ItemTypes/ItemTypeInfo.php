<?php

declare(strict_types=1);

namespace Mistralys\Starfield\ItemTypes;

use AppUtils\Interfaces\StringPrimaryRecordInterface;

class ItemTypeInfo implements StringPrimaryRecordInterface
{
    private string $id;
    private string $label;

    public function __construct(string $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    public function getID() : string
    {
        return $this->id;
    }

    public function getLabel() : string
    {
        return $this->label;
    }
}
