<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ComponentsFactory;
use HtmlCreator\ElementInterface;
use PlainDataTransformer\Transform;

class Main implements ElementInterface
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
            <main>
                $this->items
            </main>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new ComponentsFactory(Transform::toArray($data['items'] ??= []))
        );
    }
}
