<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

function pNL() : void
{
    echo PHP_EOL;
}

function pLine(string $message, ...$args) : void
{
    echo sprintf($message, ...$args).PHP_EOL;
}

function pSeparator() : void
{
    pLine(str_repeat('-', 65));
}

function pHeader(string $message) : void
{
    pNL();
    pSeparator();
    pLine($message);
    pSeparator();
    pNL();
}
