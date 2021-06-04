<?php
declare(strict_types=1);

namespace HtmlCreator;

abstract class AbstractElement implements ElementInterface
{
    public static function getHtmlRole(): string
    {
        return 'main';
    }
}
