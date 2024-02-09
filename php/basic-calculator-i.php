<?php

// Leetcode: https://leetcode.com/problems/basic-calculator/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $len = strlen($s);
        $ans = 0;
        $sign = 1;
        $curr = 0;
        $stack = [];

        for($i=0;$i<$len;$i++) {
            $char = $s[$i];

            if(is_numeric($char)) {
                $curr = (int) $char;
                while(($i+1) < $len && is_numeric($s[$i+1])) {
                    $curr = $curr*10 + (int) $s[$i+1];
                    $i++;
                }

                $ans += $curr * $sign;
                $curr = 0;
            }
            elseif($char == '+') {
                $sign = 1;
            }
            elseif($char == '-') {
                $sign = -1;
            }
            elseif($char == '(') {
                array_push($stack, $ans);
                array_push($stack, $sign);
                $ans = 0;
                $sign = 1;
            }
            elseif($char == ')') {
                $prevSign = array_pop($stack);
                $prevAns = array_pop($stack);

                $ans = ($ans * $prevSign) + $prevAns;
            }
        }

        return $ans;
    }
}
