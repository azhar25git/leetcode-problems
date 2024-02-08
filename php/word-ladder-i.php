<?php

// Leetcode: https://leetcode.com/problems/word-ladder/

class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        if(!in_array($endWord, $wordList)) return 0; // edge case
        if(!in_array($beginWord, $wordList)) {
            $wordList = array_merge($wordList, [$beginWord]);
        }
        $len = strlen($endWord);
        $nei = [];

        foreach($wordList as $word) {
            for($i=0;$i<$len;$i++) {
                $pattern = substr_replace($word, '*', $i, 1);
                if(!isset($nei[$pattern])) $nei[$pattern] = [];
                $nei[$pattern][] = $word;
            }
        }

        $visit = [];
        $q = new SplQueue;
        $q->enqueue($beginWord);
        $visit[$beginWord] = 1;
        $res = 1;
        
        while(!$q->isEmpty()) {
            $count = $q->count();
            for($i=0;$i<$count;$i++) {
                $word = $q->dequeue();
                if($word == $endWord) {
                    return $res;
                }
                
                for($j=0;$j<$len;$j++) {
                    $pattern = substr_replace($word, '*', $j, 1);
                    foreach($nei[$pattern] as $neiWord) {
                        if(!isset($visit[$neiWord])) {
                            $visit[$neiWord] = 1;
                            $q->enqueue($neiWord);
                        }
                    }
                }
            }
            $res++;
        }

        return 0;
    }
}
