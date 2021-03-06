<?php

declare(strict_types=1);

namespace HtmlCreator\Helmet;

class AppleTouchPrecomposedIcon extends AbstractIcon
{
    public function getHtml(): string
    {
        return <<<HTML
            <link rel="apple-touch-icon-precomposed" sizes="$this->size" href="$this->url" data-react-helmet="true">
HTML;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['url'] ??= '',
            (string) $data['size'] ??= '',
        );
    }
}
