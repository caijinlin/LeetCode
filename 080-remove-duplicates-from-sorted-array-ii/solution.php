class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $len = count($nums);
        $i = 1;
        $j = 2;
        
        while ($j < $len) {
            if ($nums[$j] == $nums[$i] && $nums[$j] == $nums[$i-1]) {
                $j++;
            } else {
                $nums[++$i] = $nums[$j++];
            }
        }
                
        return $i + 1;
    }
}
