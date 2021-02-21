<?php

declare(strict_types=1);

namespace HtmlCreator;

use HtmlCreator\Exception\ClassNotExists;
use HtmlCreator\Exception\InvalidClass;

class ItemsFactory implements ItemsFactoryInterface
{
    /**
     * @param array<string, array> $items
     */
    public function __construct(private array $items, private string $itemClassName)
    {
        if (!class_exists($this->itemClassName)) {
            throw new ClassNotExists(sprintf('Given Item class "%s" not exists.', $this->itemClassName));
        }

        if (!in_array(ElementInterface::class, class_implements($this->itemClassName) ?: [])) {
            throw new InvalidClass(sprintf('Given Item class has to implement %s.', ElementInterface::class));
        }
    }

    public function getHtml(): string
    {
        $items = '';

        foreach ($this->items as $item) {
            $items .= (string) $this->itemClassName::createFromArray($item);
        }

        return $items;
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
