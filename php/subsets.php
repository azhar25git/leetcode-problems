<?php

// Leetcode link: https://leetcode.com/problems/subsets

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $res = [];

        $this->bt($res, [], $nums, 0);

        return $res;
    }

    function bt(&$res, $temp, $nums, $start) {
        array_push($res, $temp);
        for($i=$start; $i<count($nums); $i++) {
            array_push($temp, $nums[$i]);
            $this->bt($res, $temp, $nums, $i+1);
            array_pop($temp);
        }
    }
}
