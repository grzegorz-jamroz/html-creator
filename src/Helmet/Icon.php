<?php

declare(strict_types=1);

namespace HtmlCreator\Helmet;

class Icon extends AbstractIcon
{
    public function getHtml(): string
    {
        return <<<HTML
            <link rel="icon" type="$this->type" sizes="$this->size" href="$this->url" data-react-helmet="true">
HTML;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['url'] ??= '',
            (string) $data['size'] ??= '',
            (string) $data['type'] ??= '',
        );
    }
}
