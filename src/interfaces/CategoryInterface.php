<?php

namespace Interfaces;

/**
 * Interface representing a category component in the category tree.
 */
interface CategoryInterface
{
    // get the name of the category
    public function getName(): string;
    
    //get the parent of the current category
    public function getParent(): ?CategoryInterface;
    
    //adding a child to the current category
    public function addChild(CategoryInterface $child);

    //getting the children of the current category 
    public function getChildren(string $parent): array;
}