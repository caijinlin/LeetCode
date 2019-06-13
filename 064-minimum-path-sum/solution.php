class Solution {
    
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $row = count($grid);
        $col = count($grid[0]);
        
        $dp = array();
        
        $dp[0][0] = $grid[0][0];
        
        // 只能向下
        for($i=1;$i<$row;$i++) {
            $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];  
        }
        
        // 只能向右
        for($i=1;$i<$col;$i++) {
            $dp[0][$i] = $dp[0][$i-1] + $grid[0][$i];  
        }
        
        // 取向下&向右的最小值
        for($i=1;$i<$row;$i++) {
            for($j=1;$j<$col;$j++) {
                $dp[$i][$j] = min($dp[$i-1][$j], $dp[$i][$j-1]) + $grid[$i][$j];
            }
        }
        
        return $dp[$row-1][$col-1];
        
    }
}
