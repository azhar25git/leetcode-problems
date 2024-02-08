<?php

// Leetcode: https://leetcode.com/problems/find-median-from-data-stream

class MedianFinder {
    /**
     */
    function __construct() {
        $this->small = new SplMaxHeap;
        $this->large = new SplMinHeap;
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num) {
        // adding num to heaps
        if (!$this->large->isEmpty() && $num > $this->large->top()) {
            $this->large->insert($num);
        } else {
            $this->small->insert($num);
        }
        // handle uneven heaps
        if(count($this->small) > (count($this->large)+1)) {
            $this->large->insert($this->small->extract());
        }
        else if((count($this->small)+1) < count($this->large)) {
            $this->small->insert($this->large->extract());
        }
    }
  
    /**
     * @return Float
     */
    function findMedian() {
        if(count($this->small) > count($this->large)) {
            return $this->small->top();
        }
        elseif(count($this->small) < count($this->large)) {
            return $this->large->top();
        }
        else {
            return ($this->small->top()+$this->large->top())/2;
        }
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */
