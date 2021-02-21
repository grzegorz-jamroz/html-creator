<?php

declare(strict_types=1);

namespace HtmlCreator;

class PageBuilder implements PageBuilderInterface
{
    public function __construct(
        private string $language,
        private string $jsSrc,
        private string $cssSrc,
        private HelmetInterface $helmet,
        private ContentBuilderInterface $contentBuilder,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            <!doctype html>
            <html lang="$this->language">
            <head>
                $this->helmet
                <link href="{$this->cssSrc}" rel="stylesheet">
            </head>
            <body>
            <div id="root">
                $this->contentBuilder
            </div>
            <script src="{$this->jsSrc}"></script>
            </body>
            </html>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
