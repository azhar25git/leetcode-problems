<?php

// Leetcode : https://leetcode.com/problems/minimum-window-substring/

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        if ($t == '') return '';

        [$countT, $window] = [[], []];
        for($i=0;$i<strlen($t);$i++) {
            $c = $t[$i];
            $countT[$c] = 1 + ($countT[$c] ?? 0);
        }

        [$have, $need] = [0, count($countT)];
        [$res, $resLen] = [[-1,-1], PHP_INT_MAX];
        $l = 0;
        for($r=0;$r<strlen($s);$r++) {
            $c = $s[$r];
            $window[$c] = 1 + ($window[$c] ?? 0);
            if(isset($countT[$c]) && $window[$c] == $countT[$c]) {
                $have++;
            }

            while($have === $need) {
                if(($r-$l+1) < $resLen) {
                    $res = [$l,$r];
                    $resLen = $r-$l+1;
                }
                $v = $s[$l];
                $window[$v]--;
                if(isset($countT[$v]) && $window[$v] < $countT[$v]) {
                    $have--;
                }
                $l++;
            }
        }
        [$l,$r] = $res;
        if ($resLen != PHP_INT_MAX) {
            return substr($s, $l, $r - $l + 1);
        } else {
            return "";
        }
    }
}
