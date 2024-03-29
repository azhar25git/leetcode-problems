<?php

/**
* Leetcode problem link: https://leetcode.com/problems/time-based-key-value-store/
*/
class TimeMap {
    /**
     */
    function __construct() {
        $this->map = [];
    }
  
    /**
     * @param String $key
     * @param String $value
     * @param Integer $timestamp
     * @return NULL
     */
    function set($key, $value, $timestamp) {
        $this->map[$key][] = [$value, $timestamp];
    }
  
    /**
     * @param String $key
     * @param Integer $timestamp
     * @return String
     */
    function get($key, $timestamp) {
        $res =  "";
        if(null === ($values = $this->map[$key])) return $res;
        $l = 0;
        $r = count($values)-1;

        while($l<=$r) {
            $mid = (int)(($l+$r)/2);
            if($values[$mid][1] <= $timestamp) {
                $l = $mid + 1;
                $res = $values[$mid][0];
            } else {
                $r = $mid - 1;
            }
        }

        return $res;
    }
}

/**
 * Your TimeMap object will be instantiated and called as such:
 * $obj = TimeMap();
 * $obj->set($key, $value, $timestamp);
 * $ret_2 = $obj->get($key, $timestamp);
 */
