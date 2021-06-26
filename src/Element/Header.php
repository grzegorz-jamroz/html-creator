<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;

class Header extends AbstractElement
{
    public function __construct(
        private string $title,
    ) {
    }

    public function getHtml(): string
    {
        if ($this->title === '') {
            return '';
        }

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
