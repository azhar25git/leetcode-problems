<?php

class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     * Leetcode link: https://leetcode.com/problems/word-break
     */
    function wordBreak($s, $wordDict) {
        return $this->dp($s,$wordDict);
    }

    function dp(&$s, $wordDict) {
        if($s=="") return true;
      
        if(isset($this->memo[$s])) return $this->memo[$s];

        foreach($wordDict as $w) {
            if(($pos = strpos($s, $w)) === 0) {
                $len = strlen($w);
                $ds = substr($s, $pos+$len);
                if($this->dp($ds, $wordDict) == true) {
                    $this->memo[$ds] = true;
                    return true;
                }
            }
        }
        $this->memo[$s] = false;
        return false;
    }

    // another solution
    // function wordBreak($s, $wordDict) {
    //     $n = strlen($s);
    //     $dp = array_fill(0,$n+1, false);
    //     $maxLen = 0;
    //     foreach($wordDict as $w) {
    //         $maxLen = max($maxLen, strlen($w));
    //     }
    //     // var_dump($maxLen);
    //     $dp[0] = true;
    //     for($i=0;$i<$n;$i++) {
    //         for($j=$i-1;$j>=0;$j--) {
    //             if($i-$j > $maxLen) continue;
    //             if($dp[$j] && in_array(substr($s, $j, $i - $j), $wordDict)){
    //                 $dp[$i] = true;
    //                 break;
    //             }
    //         }
    //     }
    //     return $dp[$n];
    // }

}
