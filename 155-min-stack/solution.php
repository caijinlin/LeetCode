class MinStack {
    
    protected $stack1 = array();
    protected $stack2 = array();
    
    /**
     * initialize your data structure here.
     */
    function __construct() {

    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        if (empty($this->stack2) || $x <= end($this->stack2)) {
            array_push($this->stack2, $x);
        }
        array_push($this->stack1, $x);
    }
  
    /**
     * @return NULL
     */
    function pop() {
        if (end($this->stack1) == end($this->stack2)) {
            array_pop($this->stack2);
        }
        array_pop($this->stack1);
    }
  
    /**
     * @return Integer
     */
    function top() {
        return end($this->stack1);
    }
  
    /**
     * @return Integer
     */
    function getMin() {
       return end($this->stack2);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
