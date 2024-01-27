<?php

// Leetcode link: https://leetcode.com/problems/subsets

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $res = [];

        $this->dfs(0, $res, [], $nums);

        return $res;
    }

    function dfs($i, &$res, $subset, $nums) {
        if($i>=count($nums)) {
            $res[] = [...$subset];
            return;
        }

        // include $nums[$i]
        array_push($subset, $nums[$i]);
        $this->dfs($i+1, $res, $subset, $nums);

        // exclude $nums[$i]
        array_pop($subset);
        $this->dfs($i+1, $res, $subset, $nums);
    }
}
