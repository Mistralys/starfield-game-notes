<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

use AppUtils\ConvertHelper;
use AppUtils\FileHelper\FileInfo;
use Mistralys\Starfield\Console\BaseEntryInfo;
use Mistralys\Starfield\Console\CommandStack;

class StarfieldConsole
{
    public static function parseCommandFile(FileInfo $commandsFile) : CommandStack
    {
        return self::parseCommandString($commandsFile->getContents());
    }

    public static function parseCommandString(string $commands) : CommandStack
    {
        $entries = array();

        foreach (ConvertHelper::explodeTrim("\n", $commands) as $line)
        {
            $info = BaseEntryInfo::parseLine($line);

            if($info !== null) {
                $entries[] = $info;
            }
        }

        return new CommandStack($entries);
    }
}
