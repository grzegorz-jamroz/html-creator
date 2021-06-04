<?php

declare(strict_types=1);

namespace HtmlCreator\Helmet;

use HtmlCreator\AbstractElement;

abstract class AbstractIcon extends AbstractElement
{
    public function __construct(
        protected string $url,
        protected string $size,
        protected string $type = '',
    ) {
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
