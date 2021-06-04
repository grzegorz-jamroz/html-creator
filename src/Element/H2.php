<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;

class H2 extends AbstractElement
{
    public function __construct(
        private string $title,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->title) {
            return '';
        }

        return <<<HTML
            <h2>$this->title</h2>
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
