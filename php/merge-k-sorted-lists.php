<?php

// Leetcode: https://leetcode.com/problems/merge-k-sorted-lists/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $arr = [];

        foreach($lists as $list) {
            while($list != null) {
                $arr[] = $list->val;
                $list = $list->next;
            }
        }
        sort($arr);

        $ans = new ListNode(array_pop($arr), null);
        
        foreach(array_reverse($arr) as $a) {
            $ans = new ListNode($a, $ans);
        }

        return $ans;
    }
}
