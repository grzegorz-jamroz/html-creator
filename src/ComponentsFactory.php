<?php

declare(strict_types=1);

namespace HtmlCreator;

use HtmlCreator\Exception\ClassNotExists;
use HtmlCreator\Exception\InvalidClass;
use PlainDataTransformer\Transform;

class ComponentsFactory implements ItemsFactoryInterface
{
    /**
     * @param array<string, array> $items
     */
    public function __construct(private array $items)
    {
    }

    public function getHtml(): string
    {
        $items = '';

        foreach ($this->items as $item) {
            try {
                $items .= (string) $this->getComponentClass($item);
            } catch (\Exception $e) {
            }
        }

        return $items;
    }

    public function __toString(): string
    {
        return $this->getHtml();
    }

    /**
     * @param array<string, mixed> $item
     */
    private function getComponentClass(array $item): ElementInterface
    {
        $itemClassName = Transform::toString($item['htmlClass'] ??= '');

        if (!class_exists($itemClassName)) {
            throw new ClassNotExists(sprintf('Given Item class "%s" not exists.', $itemClassName));
        }

        if (!in_array(ElementInterface::class, class_implements($itemClassName) ?: [])) {
            throw new InvalidClass(sprintf('Given Item class has to implement %s.', ElementInterface::class));
        }

        return $itemClassName::createFromArray($item);
    }
}
