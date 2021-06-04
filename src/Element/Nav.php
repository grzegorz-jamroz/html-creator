<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;

class Nav extends AbstractElement
{
    public function __construct(
        private string $items,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->items) {
            return '';
        }

        return <<<HTML
            <nav>
                $this->items
            </nav>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) NavItems::createFromArray($data),
        );
    }
}
