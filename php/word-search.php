<?php

// Leetcode: https://leetcode.com/problems/word-search/

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $this->rows = count($board);
        $this->cols = count($board[0]);
        $this->board = $board;
        $this->word = $word;

        for($r=0;$r<$this->rows;$r++) {
            for($c=0;$c<$this->cols;$c++) {
                
                if($this->dfs($r, $c, 0) == true){
                    return true;
                }
            }

        }
        return false;

    }

    function dfs($r, $c, $i) {
        if($i == strlen($this->word)) return true;
        if($r < 0 || $r >= $this->rows 
        || $c < 0 || $c >= $this->cols 
        || $this->word[$i] != $this->board[$r][$c]) return false;

        $temp = $this->board[$r][$c];
        $this->board[$r][$c] = '.';

        $res= ($this->dfs($r+1, $c, $i+1)
            || $this->dfs($r-1, $c, $i+1)
            || $this->dfs($r, $c+1, $i+1)
            || $this->dfs($r, $c-1, $i+1)
        );
        $this->board[$r][$c] = $temp;
        return $res;
    }
}
