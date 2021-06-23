<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;
use PlainDataTransformer\Transform;

class FigureVideo extends AbstractElement
{
    public function __construct(
        private string $video,
        private string $figcaption,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->video) {
            return '';
        }

        return <<<HTML
            <figure>
                $this->video
                $this->figcaption
            </figure>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) new Link(
                Transform::toString($data['url'] ??= ''),
                (string) Video::createFromArray($data['video'] ??= []),
            ),
            (string) Figcaption::createFromArray($data['video'] ??= []),
        );
    }
}
