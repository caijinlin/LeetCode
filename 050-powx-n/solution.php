class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        
        if ($n < 0) {
            return 1/$this->myPow($x, -$n);
        }
        
        if ($n == 0) {
            return 1;
        }
        
        if ($n == 1) {
            return $x;
        }
        
        if ($n == 2) {
            return $x * $x;
        }
         
        // n为偶数
        if (($n & 1) == 0) {
            $sum = $this->myPow($x, $n/2);
            return $sum * $sum;
        } else {
            $sum = $this->myPow($x, ($n-1)/2);
            return $sum * $sum * $x;
        }
    }
}
