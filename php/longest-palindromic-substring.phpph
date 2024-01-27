<?php

// Leetcode link: https://leetcode.com/problems/longest-palindromic-substring

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $res = "";

        for($i=0;$i<strlen($s);$i++) {
            $this->findPalindrome($i,$i,$s, $res); // checks odd palindrome
            $this->findPalindrome($i,$i+1,$s, $res); // checks even palindrome
        }

        return $res;
    }

    function findPalindrome($left,$right,$s, &$res) {

        while(($left>=0 && $right<strlen($s)) && $s[$left] == $s[$right]) {
            $curlen = ($right - $left + 1); 
            if($curlen > strlen($res)){
                $res = substr($s, $left, $curlen);
            }
            $left--;
            $right++;
        }

    }
}
