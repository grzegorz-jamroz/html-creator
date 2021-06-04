<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;
use HtmlCreator\ItemsFactory;

class NavItems extends AbstractElement
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
            <ul>
                $this->items
            </ul>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new ItemsFactory($data['items'] ??= [], NavItem::class),
        );
    }
}
