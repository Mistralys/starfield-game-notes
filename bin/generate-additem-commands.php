<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

use AppUtils\FileHelper\FileInfo;

require_once __DIR__.'/bootstrap.php';

parseCommands();

function parseCommands(?string $logFilePath=null, int $amount=1) : void
{
    if(empty($logFilePath)) {
        $logFilePath = GAME_FOLDER.'/'.CONSOLE_OUTPUT_LOG_PATH;
    }

    $commandsFile = FileInfo::factory($logFilePath);
    $outputFile = FileInfo::factory(GAME_FOLDER . '/'.BAT_SUBFOLDER_NAME.'/additem-commands.txt');

    $items = StarfieldConsole::parseCommandFile($commandsFile)->getItemEntries()->getAll();

    pHeader('Generating additem commands');

    pLine('Found %s items.', count($items));
    pNL();

    $lines = array();
    foreach($items as $item)
    {
        pLine('Item [%s]: %s', $item->getItemCode(), $item->getItemLabel());

        $lines[] = sprintf(
            "player.additem %s %s; %s",
            $item->getItemCode(),
            $amount,
            $item->getItemLabel()
        );
    }

    $outputFile->putContents(implode("\n", $lines));

    pNL();
    pSeparator();
    pNL();

    pLine('Saved to:');
    pLine($outputFile->getPath());
    pNL();
    pLine('Console command:');
    pLine('bat "%s/%s"', BAT_SUBFOLDER_NAME, $outputFile->getBaseName());
}
