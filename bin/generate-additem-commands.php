<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

use AppUtils\FileHelper\FileInfo;

require_once __DIR__.'/bootstrap.php';

parseCommands();

function parseCommands(?string $logFilePath=null) : void
{
    if(empty($logFilePath)) {
        $logFilePath = GAME_FOLDER.'/Data/SFSE/Plugins/sfse_plugin_console.log';
    }

    $commandsFile = FileInfo::factory($logFilePath);
    $outputFile = FileInfo::factory(GAME_FOLDER . '/bat/additem-commands.txt');

    $items = StarfieldConsole::parseCommandFile($commandsFile)->getItemEntries()->getAll();

    pHeader('Generating additem commands');

    pLine('Found %s items.', count($items));
    pNL();

    $lines = array();
    foreach($items as $item)
    {
        pLine('Item [%s]: %s', $item->getItemCode(), $item->getItemLabel());

        $lines[] = sprintf(
            "player.additem %s ; %s",
            $item->getItemCode(),
            $item->getItemLabel()
        );
    }

    $outputFile->putContents(implode("\n", $lines));

    pNL();
    pSeparator();
    pNL();

    pLine('Import command:');
    pLine('bat %s', $outputFile->getBaseName());
}
