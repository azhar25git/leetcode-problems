<?php

// Leetcode: https://leetcode.com/problems/binary-tree-right-side-view/
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
     * @return Integer[]
     */
    function rightSideView($root) {
        if(!$root) return [];
        $res = [];
        $this->dfs($root, 0, $res);

        return $res;
    }

    function dfs($root, $level, &$res) {
        if(!$root) return;
        if(!isset($res[$level])) {
            $res[$level] = $root->val;
        }
        $this->dfs($root->right, $level+1, $res);
        $this->dfs($root->left, $level+1, $res);
    }
}
