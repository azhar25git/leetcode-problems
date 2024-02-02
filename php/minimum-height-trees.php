<?php

class Solution {

    // Leetcode: https://leetcode.com/problems/minimum-height-trees/
    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees($n, $edges) {
        if($n === 1) return [0];

        $map = [];
        $degrees = array_fill(0, $n, 0);

        foreach($edges as [$x,$y]) {
            $map[$x][] = $y;
            $map[$y][] = $x;
            $degrees[$x]++;
            $degrees[$y]++;
        }

        $q = [];
        foreach($degrees as $l=>$deg) {
            if($deg === 1) {
                $q[] = $l;
                $degrees[$l]--;
            }
        }

        // bfs
        while(count($q)>0) {
            $s = count($q);
            $ans = [];

            for($i=0;$i<$s;$i++) {
                $curr = array_shift($q);
                $ans[] = $curr;

                foreach($map[$curr] as $node) {
                    $degrees[$node]--;

                    if($degrees[$node] === 1) {
                        $q[] = $node;
                    }
                }
            }
        }

        return $ans;
        
    }
}
