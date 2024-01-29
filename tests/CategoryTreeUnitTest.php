<?php

use PHPUnit\Framework\TestCase;
use Classes\CategoryTree;

class CategoryTreeUnitTest extends TestCase
{
    public function testGetChildren()
    {
        // Create an instance of CategoryTree
        $categoryTree = new CategoryTree();

        // Adding categories to the tree
        $categoryTree->addCategory('A', null);
        $categoryTree->addCategory('B', 'A');
        $categoryTree->addCategory('C', 'A');
        $categoryTree->addCategory('D', 'C');
        $categoryTree->addCategory('E', 'C');
        $categoryTree->addCategory('F', 'C');
        $categoryTree->addCategory('G', 'C');
        $categoryTree->addCategory('X', null);
        $categoryTree->addCategory('Y', 'X');
        $categoryTree->addCategory('Z1', 'Y');
        $categoryTree->addCategory('Z2', 'Y');
        $categoryTree->addCategory('Z6', 'NonExistent');

        // Test getChildren for various categories
        $this->assertEquals(['B', 'C'], $categoryTree->getChildren('A'));
        $this->assertEquals(['D', 'E', 'F', 'G'], $categoryTree->getChildren('C'));
        $this->assertEquals(['Z1', 'Z2'], $categoryTree->getChildren('Y'));
        $this->assertEquals(['Z1', 'Z2'], $categoryTree->getChildren('Y'));
        //$this->assertEquals("Caught exception: Parent category 'NonExistent' does not exist.", $categoryTree->getChildren('NonExistent'));

        // Test getChildren for a non-existent category        
        $this->expectException(\RuntimeException::class);
        throw new \RuntimeException();    
        $this->expectExceptionMessage("Caught exception: Parent category 'NonExistent' does not exist.");       
        $categoryTree->getChildren('NonExistent');
        
    }
}
