<?php

declare(strict_types=1);

namespace HtmlCreator;

interface ElementInterface extends Renderable, ArrayConstructable
{
    const HEADER = 'header';
    const FOOTER = 'footer';
    const NAVBAR  = 'navbar';
    const MAIN  = 'main';

    /**
     * @return string ("header", "navbar", "main", "footer")
     */
    public static function getHtmlRole(): string;
}
