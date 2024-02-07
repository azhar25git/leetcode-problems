<?php

// Leetcode: https://leetcode.com/problems/kth-smallest-element-in-a-bst/

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
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    // iterative solution
    // function kthSmallest($root, $k) {
    //     $stack = [];
    //     $count = 0;

    //     while ($root !== null || !empty($stack)) {
    //         while ($root !== null) {
    //             $stack[] = $root;
    //             $root = $root->left;
    //         }

    //         $root = array_pop($stack);
    //         $count++;
            
    //         if ($count == $k) {
    //             return $root->val;
    //         }

    //         $root = $root->right;
    //     }

    //     return -1; // Return -1 if k is out of range or tree is empty
    // }
    // recursive solution
    function kthSmallest($root, $k) {
        $this->count = 0;
        return $this->inOrderTraversal($root, $k);
    }

    function inOrderTraversal($root, $k) {
        if ($root == null) {
            return -1; // Return -1 if the tree is empty
        }

        // Traverse left subtree
        $left = $this->inOrderTraversal($root->left, $k);
        if ($left != -1) {
            return $left;
        }

        // Process current node
        $this->count++;
        if ($this->count == $k) {
            return $root->val;
        }

        // Traverse right subtree
        return $this->inOrderTraversal($root->right, $k);
    }
}
