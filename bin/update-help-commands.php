<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

use AppUtils\FileHelper\FileInfo;

require_once __DIR__.'/bootstrap.php';

updateHelpCommands();

function updateHelpCommands() : void
{
    $sourceFile = FileInfo::factory(__DIR__.'/help-commands.txt');
    $targetFile = FileInfo::factory(GAME_FOLDER.'/'.BAT_SUBFOLDER_NAME.'/help-commands.txt');

    pHeader('Updating help commands batch file');

    if(!$sourceFile->exists()) {
        pLine('Please create the file %s first.', $sourceFile->getName());
        return;
    }

    $targetFile->putContents($sourceFile->getContents());

    pLine('Help commands updated.');
    pLine('Target file:');
    pLine($targetFile->getPath());
    pNL();
    pLine('Console command:');
    pLine('bat "%s/%s"', BAT_SUBFOLDER_NAME, $targetFile->getBaseName());
}
