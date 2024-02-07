<?php

// Leetcode: https://leetcode.com/problems/lru-cache/

class Node {
    function __construct($key, $val) {
        $this->key = $key;
        $this->val = $val;
        $this->prev = $this->next = null;
    }
}

class LRUCache {
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->cap = $capacity;
        $this->cache = [];

        $this->left = new Node(0,0);
        $this->right = new Node(0,0);
        $this->left->next = $this->right;
        $this->right->prev = $this->left;
    }

    function remove($node) {
        // A -- B -- C
        
        $prev = $node->prev; // A
        $next = $node->next; // C
        $prev->next = $next; // A - next = C
        $next->prev = $prev; // C - prev = A

        // now A -- C and node B is removed
    }


    // insert at right
    function insert($node) {
        $prev = $this->right->prev;
        $next = $this->right;

        $next->prev = $node;
        $prev->next = $node;
        $node->prev = $prev;
        $node->next = $next;
    }

  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->cache[$key])) {
            $this->remove($this->cache[$key]);
            $this->insert($this->cache[$key]);
            return $this->cache[$key]->val;
        }
        return -1;
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(isset($this->cache[$key])) {
            $this->remove($this->cache[$key]);
        }
        $this->cache[$key] = new Node($key, $value);
        $this->insert($this->cache[$key]);

        if(count($this->cache) > $this->cap) {
            $lru = $this->left->next;
            $this->remove($lru);
            unset($this->cache[$lru->key]);
        }
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
