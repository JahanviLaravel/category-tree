<?php

namespace Classes;
use Interfaces\CategoryInterface;

/**
 * Represents the category tree structure.
 */
class CategoryTree implements CategoryInterface
{
    private array $categories = [];

    public function addChild(CategoryInterface $child)
    {
        $this->categories[$child->getName()] = $child;
    }

    public function getName(): string
    {
        return ''; // Empty string for the root of the tree
    }

    public function getParent(): ?CategoryInterface
    {
        return null; // The tree itself has no parent
    }

    public function getChildren(string $parent): array
    {
        try {
            if (!isset($this->categories[$parent])) {
                throw new \InvalidArgumentException("Parent category '$parent' does not exist.");
            }
    
            $childrenNames = [];
    
            foreach ($this->categories as $category) {
                if ($category->getParent() === $this->categories[$parent]) {
                    $childrenNames[] = $category->getName();
                }
            }
    
            return $childrenNames;
        } catch (\InvalidArgumentException $e) {
            // Handle the exception or rethrow it if needed
            echo 'Caught exception: ' . $e->getMessage() . PHP_EOL;
            return []; // or throw $e; if you want to rethrow the exception
        }
    }

    public function addCategory(string $category, string $parent = null): void
    {
        try{
            if (isset($this->categories[$category])) {
                throw new \InvalidArgumentException("Category '$category' already exists.");
            }

            if ($parent !== null && !isset($this->categories[$parent])) {
                throw new \InvalidArgumentException("Parent category '$parent' does not exist.");
            }

            $parentNode = $parent !== null ? $this->categories[$parent] : $this;
            $childNode = new Category($category, $parentNode);
            $parentNode->addChild($childNode);     
            $this->categories[$category] = $childNode;
        }
        catch(\InvalidArgumentException $e) {
            echo 'Caught exception: ' . $e->getMessage() . PHP_EOL;
          }
    }
}
