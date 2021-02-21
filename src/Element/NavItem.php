<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\ElementInterface;

class NavItem implements ElementInterface
{
    public function __construct(
        private string $name,
        private string $url,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            <li><a href="$this->url">$this->name</a></li>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['name'] ??= '',
            (string) $data['url'] ??= '',
        );
    }
}
