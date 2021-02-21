<?php

declare(strict_types=1);

namespace HtmlCreator;

use HtmlCreator\Element as Element;

class ContentBuilder implements ContentBuilderInterface
{
    public function __construct(
        private string $header,
        private string $nav,
        private string $sections,
        private string $footer,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            $this->header
            $this->nav
            <main>
                $this->sections
            </main>
            $this->footer
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new Element\Header((string) $data['header'] ??= ''),
            (string) Element\Nav::createFromArray($data['navbar'] ??= []),
            (string) new ItemsFactory($data['sections'] ??= [], Element\Section::class),
            (string) new Element\Footer(
                (string) new Element\Paragraph((string) $data['footer']['text'] ??= ''),
            ),
        );
    }
}
