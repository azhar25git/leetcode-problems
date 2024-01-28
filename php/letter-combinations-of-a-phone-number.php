<?php

// Leetcode : https://leetcode.com/problems/letter-combinations-of-a-phone-number

class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if(!$digits) return [];
        //backtrack
        $res = [];
        $map = [
            '2' => ['a','b','c'],
            '3' => ['d','e','f'],
            '4' => ['g','h','i'],
            '5' => ['j','k','l'],
            '6' => ['m','n','o'],
            '7' => ['p','q','r','s'],
            '8' => ['t','u','v'],
            '9' => ['w','x','y','z']
        ];

        $this->backtrack($digits, 0, '', $map, $res);

        return $res;
    }

    function backtrack($digits, $i, $temp, $map, &$res) {
        if(strlen($temp) == strlen($digits)) {
            $res[] = $temp;
            return;
        }

        foreach($map[$digits[$i]] as $char) {
            $this->backtrack($digits, $i+1, $temp.$char, $map, $res);
        }

    }

}
