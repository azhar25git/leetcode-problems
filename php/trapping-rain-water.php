<?php

// Leetcode: https://leetcode.com/problems/trapping-rain-water/

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        if(!$height) return 0;
        [$l, $r] = [0, count($height)-1];
        [$leftMax, $rightMax] = [$height[$l], $height[$r]];
        $res = 0;

        while ($l < $r) {
            if($leftMax < $rightMax) {
                $l++;
                $leftMax = max($leftMax, $height[$l]);
                $res += $leftMax - $height[$l];
            } else {
                $r--;
                $rightMax = max($rightMax, $height[$r]);
                $res += $rightMax - $height[$r];
            }
        }

        return $res;
    }
}
