class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        $count = count($intervals);
        if ($count <= 1) {
            return $intervals;
        } 
        
       sort($intervals);
        
        $i = 1; // 原数组下标
        $j = 0; // 结果数组下标
        
        while ($i < $count) {
            $interval1 = $intervals[$j];
            $interval2 = $intervals[$i];
            if ($interval2[0] <= $interval1[1]) {
                $intervals[$i] = array(); // delete
                // 原数组操作
                $intervals[$j][1] = $interval1[1] > $interval2[1] 
                    ? $interval1[1] 
                    : $interval2[1];
            } else {
                $j = $i; // 数组unset后，index不变，j跳转到i
            }
            $i++;
        }
        
        $intervals = array_filter($intervals);
        return $intervals;
    }
}
