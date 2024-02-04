<?php

// Leetcode: https://leetcode.com/problems/task-scheduler/

class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    // function leastInterval($tasks, $n) {

    //     if($n === 0) {
    //         return count($tasks);
    //     }

    //     $group = array_count_values($tasks);
    //     $time = 0;
    //     $maxHeap = new SplMaxHeap();
    //     foreach($group as $v) {
    //         $maxHeap->insert($v);
    //     }
        
    //     $q = [];

    //     while (count($maxHeap)>0 || count($q)>0) {
    //         $time++;
    //         if(count($maxHeap)>0) {
    //             $cnt = $maxHeap->extract() - 1;
                
    //             if($cnt > 0) {
    //                 array_unshift($q, [$cnt, $time + $n]);
    //             }
    //         }
    //         if(($cq = count($q))>0 && $q[$cq-1][1] === $time) {
    //             $maxHeap->insert(array_pop($q)[0]);
    //         }
    //     }

    //     return $time;
    // }
    // efficient
    function leastInterval($tasks, $n) {
        if($n === 0) return count($tasks);
        $taskQtyAr = array_count_values($tasks);
        rsort($taskQtyAr);
        $distinctTasks = count($taskQtyAr);
        $gapsNum = $taskQtyAr[0] - 1;
        $maxGap = $gapsNum * $n;

        for ($i=1; $i<=$distinctTasks - 1; $i++) {
            $maxGap = $maxGap - min($gapsNum, $taskQtyAr[$i]);
        }
        return ($maxGap > 0) ? count($tasks) + $maxGap : count($tasks);
    }
}
