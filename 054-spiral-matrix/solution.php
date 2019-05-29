class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $row = count($matrix);
        $col = count($matrix[0]);
        $size = $row * $col;
                
        $result = array();
        
        for ($i=0;$i<=($row-1)/2;$i++) {
            // 水平向右
            for($j=$i;$j <= $col-$i-1 && count($result) < $size;$j++) {
                array_push($result, $matrix[$i][$j]);
            }
            // 垂直向下
            for($j=$i+1;$j <= $row-$i-1 && count($result) < $size ;$j++) {
                array_push($result, $matrix[$j][$col-$i-1]);
            }
            // 水平向左
            for($j=$col-$i-2;$j >= $i && count($result) < $size;$j--) {
                array_push($result, $matrix[$row-$i-1][$j]);
            }
            // 垂直向上
            for($j=$row-$i-2;$j >= $i+1 && count($result) < $size;$j--) {
                array_push($result, $matrix[$j][$i]);
            }
        }
        
        return $result;
    }
}
