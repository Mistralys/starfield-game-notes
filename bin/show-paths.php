<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

use AppUtils\FileHelper;

require_once __DIR__.'/bootstrap.php';

showPaths();

function showPaths() : void
{
    pHeader('Game paths');

    pLine('Game folder:');
    pLine(FileHelper::normalizePath(GAME_FOLDER));

    pNL();

    pLine('Console command log path:');
    pLine(FileHelper::normalizePath(GAME_FOLDER.'/'.CONSOLE_OUTPUT_LOG_PATH));

    pNL();

    pLine('Batch files folder:');
    pLine(FileHelper::normalizePath(GAME_FOLDER.'/'.BAT_SUBFOLDER_NAME));
}
