<?php

/**
* Leetcode link: https://leetcode.com/problems/accounts-merge/
*/
class UnionFind {
    function __construct($n) {
        $this->par = range(0, $n-1);
        $this->rank = array_fill(0, $n, 1);
    }

    function find($x) {
        while($x != $this->par[$x]) {
            $this->par[$x] = $this->par[$this->par[$x]];
            $x = $this->par[$x];
        }
        return $x;
    }

    function union($x1, $x2) {
        [$p1, $p2] = [$this->find($x1), $this->find($x2)];
        if($p1 == $p2) return false;
        if($this->rank[$p1] > $this->rank[$p2]) {
            $this->par[$p2] = $p1;
            $this->rank[$p1] += $this->rank[$p2];
        }
        else {
            $this->par[$p1] = $p2;
            $this->rank[$p2] += $this->rank[$p1];
        }
        return true;
    }
}

class Solution {

    /**
     * @param String[][] $accounts
     * @return String[][]
     */
    function accountsMerge($accounts) {
        $uf = new UnionFind(count($accounts));
        $emailToAccount = [];
        foreach($accounts as $i=>$acc) {
            for($j=1;$j<count($acc);$j++){
                if(isset($emailToAccount[$acc[$j]])){
                    $uf->union($i,$emailToAccount[$acc[$j]]);
                }
                else {
                    $emailToAccount[$acc[$j]] = $i;
                }
            }
        }
        $emailGroup = [];
        foreach($emailToAccount as $e=>$i) {
            $leader = $uf->find($i);
            $emailGroup[$leader][] = $e;
        }
        $res = [];
        foreach($emailGroup as $i => $emails) {
            $name = $accounts[$i][0];
            sort($emails);
            $res[] = [$name, ...$emails];
        }
        return $res;
    }

}
