<?php

// Leetcode: https://leetcode.com/problems/maximum-profit-in-job-scheduling/

class Solution {

    /**
     * @param Integer[] $startTime
     * @param Integer[] $endTime
     * @param Integer[] $profit
     * @return Integer
     */
    function jobScheduling($startTime, $endTime, $profit) {
        if(count($profit) == 1) return $profit[0];
        $this->len = count($profit);
        $this->cache = [];
        for($i=0;$i<$this->len;$i++) {
            $this->range[$i] = [
                $startTime[$i],
                $endTime[$i],
                $profit[$i]
            ];
        }
        sort($this->range);

        return $this->dfs(0);
    }

    function dfs($i) {
        if($i == $this->len) {
            return 0;
        }
        if(isset($this->cache[$i])) {
            return $this->cache[$i];
        }
        // dont include
        $res = $this->dfs($i+1);
        // include
        $j = $this->bs($this->range[$i][1]);
        $res = max($res, ($this->range[$i][2] + $this->dfs($j)));
        
        $this->cache[$i] = $res;

        return $res;
    }

    function bs($x) {
        $left = 0;
        $right = $this->len;
        
        while ($left < $right) {
            $mid = (int)(($left + $right) / 2);
            if ($this->range[$mid][0] < $x) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        
        return $left;
    }


}
