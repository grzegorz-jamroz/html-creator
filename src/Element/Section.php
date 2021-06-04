<?php

declare(strict_types=1);

namespace HtmlCreator\Element;

use HtmlCreator\AbstractElement;
use HtmlCreator\ElementInterface;
use HtmlCreator\Exception\ClassNotExists;
use HtmlCreator\Exception\InvalidClass;

class Section extends AbstractElement
{
    public function __construct(
        private string $content,
    ) {
    }

    public function getHtml(): string
    {
        if ('' === $this->content) {
            return '';
        }

        return <<<HTML
            <section>
                $this->content
            </section>
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    public static function createFromArray(array $data): self
    {
        $sectionClass = (string) $data['className'] ??= '';

        if ('' === $sectionClass) {
            return new self('');
        }

        if (!class_exists($sectionClass)) {
            throw new ClassNotExists(sprintf('Section class "%s" not exists.', $sectionClass));
        }

        if (!in_array(ElementInterface::class, class_implements($sectionClass) ?: [])) {
            throw new InvalidClass(sprintf('Section class has to implement %s.', ElementInterface::class));
        }

        return new self(
            (string) $sectionClass::createFromArray($data),
        );
    }
}
