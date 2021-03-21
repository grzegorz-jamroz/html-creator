<?php

declare(strict_types=1);

namespace HtmlCreator;

use HtmlCreator\Element as Element;
use PlainDataTransformer\Transform;

class ContentBuilder implements ContentBuilderInterface
{
    public function __construct(
        private string $header,
        private string $nav,
        private string $main,
        private string $footer,
    ) {
    }

    public function getHtml(): string
    {
        return <<<HTML
            $this->header
            $this->nav
            $this->main
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
            (string) new Element\Header(Transform::toString($data['header'] ??= '')),
            (string) Element\Nav::createFromArray(Transform::toArray($data['navbar'] ??= [])),
            (string) Element\Main::createFromArray(Transform::toArray($data['main'] ??= [])),
            (string) Element\Footer::createFromArray(Transform::toArray($data['footer'] ??= [])),
        );
    }
}
