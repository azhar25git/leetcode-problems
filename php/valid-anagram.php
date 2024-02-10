<?php

// Leetcode: https://leetcode.com/problems/valid-anagram/

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $sarr = $this->countChars($s);
        $tarr = $this->countChars($t);
        return $sarr == $tarr;
    }

    function countChars($str):array {
        $charCount = [];
        for($i=0;$i<strlen($str);$i++){
            if(!isset($charCount[$str[$i]])) {
                $charCount[$str[$i]] = 0;
            }
            $charCount[$str[$i]]++;
        }
        return $charCount;
    }
}
