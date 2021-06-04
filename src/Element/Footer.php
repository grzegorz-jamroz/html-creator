<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;

class Footer extends AbstractElement
{
    public function __construct(
        private string $content,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->content) {
            return '';
        }

        return <<<HTML
            <footer>
                $this->content
            </footer>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new Paragraph($data['text'] ??= ''),
        );
    }
}
