<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ElementInterface;

class Paragraph implements ElementInterface
{
    public function __construct(
        private string $text,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->text) {
            return '';
        }

        return <<<HTML
            <p>$this->text</p>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['text'] ??= '',
        );
    }
}
