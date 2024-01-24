<?php

/**
* Leetcode link: https://leetcode.com/problems/accounts-merge/
*/
class UnionFind {
    // Union by size
    function __construct($n) {
        $this->parent = range(0, $n-1);
        $this->size = array_fill(0, $n, 1);
    }

    function find($x) {
        while($x != $this->parent[$x]) {
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;
    }

    function union($x1, $x2) {
        [$p1, $p2] = [$this->find($x1), $this->find($x2)];
        if($p1 == $p2) return false;
        if($this->size[$p1] > $this->size[$p2]) {
            $this->parent[$p2] = $p1;
            $this->size[$p1] += $this->size[$p2];
        }
        else {
            $this->parent[$p1] = $p2;
            $this->size[$p2] += $this->size[$p1];
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
