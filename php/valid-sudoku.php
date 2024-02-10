<?php

// Leetcode: https://leetcode.com/problems/valid-sudoku/

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $cols = $rows = $squares = [];

        for($r=0;$r<9;$r++) {
            for($c=0;$c<9;$c++) {
                if($board[$r][$c] == '.') continue;
                $curr = (int) $board[$r][$c];
                $sqr = intdiv($r, 3);
                $sqc = intdiv($c, 3);
                if(
                    isset($rows[$r][$curr])
                    || isset($cols[$c][$curr])
                    || isset($squares[$sqr.','.$sqc][$curr])
                ) {
                    return false;
                }
                $cols[$c][$curr] = 1;
                $rows[$r][$curr] = 1;
                $squares[$sqr.','.$sqc][$curr] = 1;
            }
        }

        return true;
    }
}
