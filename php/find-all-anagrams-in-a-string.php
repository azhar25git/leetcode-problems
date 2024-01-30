<?php

// https://leetcode.com/problems/find-all-anagrams-in-a-string/

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p) {
        if(strlen($p) > strlen($s)) return [];
        $ans = [];
        $hashP = $hashS = array_fill_keys(range('a', 'z'), 0);
        $i = 0;
        while($i<strlen($p)){
            $hashP[$p[$i]]++;
            $hashS[$s[$i]]++;
            $i++;
        }

        if($hashP == $hashS) {
            $ans[] = 0;
        }
        $l = 1;
        $r = strlen($p);

        while($r < strlen($s)) {
            $hashS[$s[$l-1]]--;
            $hashS[$s[$r]]++;
            if($hashP == $hashS) {
                $ans[] = $l;
            }

            $l++;
            $r++;
        }

        return $ans;
        
    }

}
