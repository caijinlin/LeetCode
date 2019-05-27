class Solution {
    
    protected $solutions; // all solution
        
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $this->solutions = array();
        $this->dfs($candidates, 0 , $target, 0, array());
        
        return $this->solutions;
    }
    
     /**
     * @param Integer[] $candidates 数组
     * @param Integer $sum  one solution sum 
     * @param Integer $target 
     * @param Integer $index  遍历到第index个元素
     * @return Integer[] $solution one solution set
     */
    function dfs($candidates, $sum, $target, $index, $solution) {
        if ($sum > $target) {
            return;
        } else if ($sum == $target) {
            // 保存solution
            array_push($this->solutions, $solution);
        } else {
            // 只遍历 index 后面的，去重
            for ($i=$index; $i<count($candidates); $i++) {
                if ($sum+$candidates[$i] <= $target) {
                    // 压入，纵向遍历
                    array_push($solution, $candidates[$i]);
                    $this->dfs($candidates, ($sum+$candidates[$i]), $target, $i, $solution);
                    // 弹出，横向遍历
                    array_pop($solution);
                }
            }
        }
    }
}
