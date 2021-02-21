<?php

declare(strict_types=1);

namespace HtmlCreator;

interface Renderable extends \Stringable
{
    public function getHtml(): string;
}
