<?php

declare(strict_types=1);

namespace Mistralys\StarfieldTests\Console;

use AppUtils\FileHelper\FileInfo;
use Mistralys\Starfield\Console\CommandStack;
use Mistralys\Starfield\StarfieldConsole;
use Mistralys\StarfieldTests\TestClasses\BaseStarfieldTestCase;

class ParsingTests extends BaseStarfieldTestCase
{
    public function test_parseDocument() : void
    {
        $this->assertNotEmpty($this->getExampleEntries()->getAll());
    }

    public function test_getItems() : void
    {
        $items = $this->getExampleEntries()->getItemEntries();

        $this->assertTrue($items->countRecords() > 0);

        $this->assertNotNull($items->findByName('BH_07'));
        $this->assertNotNull($items->findByCode('1D000DC7'));
    }

    public function getExampleEntries() : CommandStack
    {
        return StarfieldConsole::parseCommandFile(FileInfo::factory(self::TEST_EXAMPLE_CONSOLE_LOG));
    }
}
