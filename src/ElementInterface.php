<?php

declare(strict_types=1);

namespace HtmlCreator;

interface ElementInterface extends Renderable, ArrayConstructable
{
    /**
     * @return string ("header", "navbar", "main", "footer")
     */
    public function getHtmlRole(): string;
}
