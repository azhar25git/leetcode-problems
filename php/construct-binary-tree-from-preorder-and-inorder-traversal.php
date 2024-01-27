<?php

// Leetcode: https://leetcode.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/submissions/1158634644/
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        if(!$preorder || !$inorder) return null;
        $root = new TreeNode($preorder[0]);
        $mid = array_search($preorder[0], $inorder);
        $root->left = $this->buildTree(array_slice($preorder, 1, $mid+1), array_slice($inorder, 0, $mid));
        $root->right = $this->buildTree(array_slice($preorder, $mid+1), array_slice($inorder, $mid+1));

        return $root;
    }
}
