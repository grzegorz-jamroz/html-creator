<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;
use PlainDataTransformer\Transform;

class Video extends AbstractElement
{
    public function __construct(
        private string $url,
        private string $type = '',
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->url) {
            return '';
        }

        $source = <<<HTML
            <source src="$this->url">
        HTML;

        if ('' !== $this->type) {
            $source = <<<HTML
                <source src="$this->url" type="$this->type">
            HTML;
        }

        return <<<HTML
            <video controls>
                $source
            </video>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            Transform::toString($data['url'] ??= ''),
            Transform::toString($data['type'] ??= ''),
        );
    }
}
