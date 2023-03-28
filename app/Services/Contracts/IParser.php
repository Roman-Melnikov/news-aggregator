<?php

namespace App\Services\Contracts;

interface IParser
{
    public function setLink(string $link): self;
    public function getParseData(): array;
}
