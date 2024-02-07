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
    function kthSmallest($root, $k) {
        $heap = [];
        $this->cache = [];
        $this->dfs($root, $k, $heap);
        sort($heap);

        return $heap[$k-1];
    }

    function dfs($root, $k, &$heap) {
        if(!$root) return;
        if(isset($this->cache[$root->val])) return;
        $this->cache[$root->val] = 1;
        $heap[] = $root->val;
        $this->dfs($root->left, $k, $heap);
        $this->dfs($root->right, $k, $heap);

        return;
    }
}
