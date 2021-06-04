<?php

declare(strict_types=1);

namespace HtmlCreator\Helmet;

use HtmlCreator\AbstractElement;

class OgImage extends AbstractElement
{
    public function __construct(
        private string $url,
        private int $width,
        private int $height,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            <meta property="og:image" itemprop="image" content="$this->url" data-react-helmet="true">
            <meta property="og:image:width" content="$this->width" data-react-helmet="true">
            <meta property="og:image:height" content="$this->height" data-react-helmet="true">
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
            (int) $data['width'] ??= 0,
            (int) $data['height'] ??= 0,
        );
    }
}
