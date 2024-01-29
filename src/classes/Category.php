<?php

namespace Classes;
use Interfaces\CategoryInterface;

/**
 * Represents a leaf node in the category tree.
 */
class Category implements CategoryInterface
{
    private string $name;
    private ?CategoryInterface $parent;

    public function __construct(string $name, ?CategoryInterface $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParent(): ?CategoryInterface
    {
        return $this->parent;
    }

    public function addChild(CategoryInterface $child)
    {
        // Leaf nodes cannot have children
    }

    public function getChildren(string $parent): array
    {
        // Leaf nodes have no children
        return [];
    }
}