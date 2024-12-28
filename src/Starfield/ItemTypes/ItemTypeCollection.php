<?php

declare(strict_types=1);

namespace Mistralys\Starfield\ItemTypes;

use AppUtils\Collections\BaseStringPrimaryCollection;
use function AppUtils\t;

/**
 * @method ItemTypeInfo getByID(string $id)
 * @method ItemTypeInfo[] getAll()
 * @method ItemTypeInfo getDefault()
 */
class ItemTypeCollection extends BaseStringPrimaryCollection
{
    public const TYPE_ARMOR = 'ARMO';

    public const DEFAULT_ID = self::TYPE_ARMOR;

    private static ?ItemTypeCollection $instance = null;

    public static function getInstance() : ItemTypeCollection
    {
        if(is_null(self::$instance)) {
            self::$instance = new ItemTypeCollection();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    public function getDefaultID(): string
    {
        return self::DEFAULT_ID;
    }

    protected function registerItems(): void
    {
        $this->registerItem(new ItemTypeInfo(self::TYPE_ARMOR, t('Armor')));
    }
}