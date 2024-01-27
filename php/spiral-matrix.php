<?php

// Leetcode link: https://leetcode.com/problems/spiral-matrix

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $rowStart = $colStart = 0;
        $rowEnd = count($matrix)-1;
        $colEnd = count($matrix[0])-1;

        $res = [];
        while($rowStart <= $rowEnd && $colStart <= $colEnd) {
            // traverse right
            for($i=$colStart;$i<=$colEnd;$i++){
                $res[] = $matrix[$rowStart][$i];
            }
            $rowStart++;
            // traverse down
            for($i=$rowStart;$i<=$rowEnd;$i++){
                $res[] = $matrix[$i][$colEnd];
            }
            $colEnd--;
            // traverse left
            if($rowStart <= $rowEnd) {
                for($i=$colEnd;$i>=$colStart;$i--){
                    $res[] = $matrix[$rowEnd][$i];
                }
                
                $rowEnd--;
            }
            // traverse top
            if($colStart <= $colEnd) {
                for($i=$rowEnd;$i>=$rowStart;$i--){
                    $res[] = $matrix[$i][$colStart];
                }
                
                $colStart++;
            }

        }

        return $res;
    }
}
