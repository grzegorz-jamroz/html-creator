<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ElementInterface;

class Link implements ElementInterface
{
    public function __construct(
        private string $url,
        private string $content,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->content) {
            return '';
        }

        if ('' === $this->url) {
            return $this->content;
        }

        return <<<HTML
            <a href="$this->url">$this->content</a>
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
            (string) $data['content'] ??= '',
        );
    }
}
