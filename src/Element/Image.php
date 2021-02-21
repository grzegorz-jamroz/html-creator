<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ElementInterface;

class Image implements ElementInterface
{
    public function __construct(
        private string $url,
        private string $alt,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->url) {
            return '';
        }

        return <<<HTML
            <img src="$this->url" alt="$this->alt" />
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['url'] ??= '',
            (string) $data['alt'] ??= '',
        );
    }
}
