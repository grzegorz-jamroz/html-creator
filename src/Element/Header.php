<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ElementInterface;

class Header implements ElementInterface
{
    public function __construct(
        private string $title,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            <header>
                <h1>$this->title</h1>
            </header>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['title'] ??= '',
        );
    }
}
