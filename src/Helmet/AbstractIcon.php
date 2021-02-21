<?php

declare(strict_types=1);

namespace HtmlCreator\Helmet;

use HtmlCreator\ElementInterface;

abstract class AbstractIcon implements ElementInterface
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
