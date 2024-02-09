<?php

// Leetcode: https://leetcode.com/problems/largest-rectangle-in-histogram/

class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $maxArea = 0;

        $stack = [];

        foreach($heights as $i=>$h) {
            $start = $i;
            while(count($stack) && end($stack)[1] > $h) {
                [$index, $height] = array_pop($stack);
                $maxArea = max($maxArea, $height*($i - $index));
                $start = $index;
            }
            $stack[] = [$start,$h];
        }

        foreach($stack as [$i,$h]) {
            $maxArea = max($maxArea, $h*(count($heights)-$i));
        }

        return $maxArea;
    }
}
