class Solution {

    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums) {
       $count = PHP_INT_MAX;
       $sum = 0;
       $i = 0;
       for ($j=0;$j<count($nums);$j++) {
           $sum += $nums[$j];
           while ($sum >= $s) {
               $count = min($count, $j - $i + 1);
               $sum -= $nums[$i++];
           }
       } 
        
       return $count != PHP_INT_MAX ? $count : 0;
    }
}
