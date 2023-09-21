<?php
namespace App\Utility;
use Generator;

function olayFunction(): string
{
    return 'OLAY';
}
function myGenerator(): Generator
{
    yield 'value1';
    yield 'value2';
}