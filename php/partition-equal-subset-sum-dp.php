<?php

// Leetcode problem: https://leetcode.com/problems/partition-equal-subset-sum/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        if((($sum = array_sum($nums)) % 2) != 0) return false;

        $sum = (int)($sum / 2);
        $dp = array_fill(0,$sum+1,false);

        $dp[0] = true;

        foreach($nums as $i) {
            for($j=$sum;$j>=$i;$j--) {
                $dp[$j] = $dp[$j] || $dp[$j-$i];

            }
        }

        return $dp[$sum];
    }
}
