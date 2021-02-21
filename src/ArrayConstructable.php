<?php

declare(strict_types=1);

namespace HtmlCreator;

interface ArrayConstructable
{
    /**
     * @param array<string, mixed> $data
     */
    public static function createFromArray(array $data): self;
}
