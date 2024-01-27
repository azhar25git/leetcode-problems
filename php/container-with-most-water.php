<?php

// Leetcode: https://leetcode.com/problems/container-with-most-water/
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $l = 0;
        $r = count($height)-1;
        $ma = 0;
        while($l < $r) {
            if($height[$l] <= $height[$r]){
                $ma = max(($r-$l)*$height[$l], $ma);
                $l++;
            } else {
                $ma = max(($r-$l)*$height[$r], $ma);
                $r--;
            }
            
        }

        return $ma;
    }
}
