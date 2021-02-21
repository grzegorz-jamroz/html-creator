<?php

declare(strict_types=1);

namespace HtmlCreator;

class PageFactory implements PageFactoryInterface
{
    public function __construct(
        private PageBuilderInterface $pageBuilder,
    ) {
    }

    public function getHtml(): string
    {
        return $this->pageBuilder->getHtml();
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
