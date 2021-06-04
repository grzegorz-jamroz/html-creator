<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;

class Figure extends AbstractElement
{
    public function __construct(
        private string $image,
        private string $figcaption,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->image) {
            return '';
        }

        return <<<HTML
            <figure>
                $this->image
                $this->figcaption
            </figure>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new Link(
                (string) $data['url'] ??= '',
                (string) Image::createFromArray($data['image'] ??= []),
            ),
            (string) Figcaption::createFromArray($data['image'] ??= []),
        );
    }
}
