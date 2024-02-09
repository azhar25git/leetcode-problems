<?php

// Leetcode: https://leetcode.com/problems/basic-calculator-ii/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $i = $cur = $prev = $res = 0;
        $cur_operation = '+';
        $slen = strlen($s);
        while ($i < $slen) {
            $cur_char = $s[$i];
            if(is_numeric($cur_char)){
                
                while($i < $slen && is_numeric($s[$i])) {
                    $cur = $cur*10+(int)$s[$i];
                    $i++;
                }
                $i--;

                if($cur_operation == '+') {
                    $res += $cur;
                    $prev = $cur;
                }
                elseif($cur_operation == '-') {
                    $res -= $cur;
                    $prev = -$cur;
                }
                elseif($cur_operation == '*') {
                    $res -= $prev;
                    $res += $prev*$cur;
                    $prev = $prev*$cur;
                }
                else {
                    $res -= $prev;
                    $res += (int)($prev/$cur);
                    $prev = (int)($prev/$cur);
                }
                $cur = 0;
            }
            elseif($cur_char != ' ') {
                $cur_operation = $cur_char;
            }
            $i++;
        }
        return $res;
    }
}
