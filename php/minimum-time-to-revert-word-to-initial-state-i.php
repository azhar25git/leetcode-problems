<?php

// Leetcode: https://leetcode.com/contest/weekly-contest-383/problems/minimum-time-to-revert-word-to-initial-state-i/

class Solution {

    /**
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    function minimumTimeToInitialState($word, $k) {
        $c = 0;
        $copy = $word;
        do {
            $copy = substr($copy, $k) . str_repeat('*', $k);
            $c++;
        } while(!$this->check($copy,$word));
        return $c;
    }
    
    function check($target,$word) {
        for($i=0;$i<strlen($word);$i++) {
            if($target[$i] != '*' && $word[$i] != $target[$i]) {
                return false;
            }
        }
        return true;
    }
}
