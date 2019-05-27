class Solution {
    
    protected $solutions; // all solution
            
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        $this->solutions = array();
        sort($candidates);
        
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
        $flag = 0;
        if ($sum > $target) {
            return;
        } else if ($sum == $target) {
            // 保存solution
            array_push($this->solutions, $solution);
            return;
        } else {
            // 只遍历 index 后面的 + flag，去重
            for ($i=$index; $i<count($candidates); $i++) {
                if ($flag != 0 && $i > 0 && $candidates[$i] == $candidates[$i-1]) {
                    continue;
                }
                if ($sum+$candidates[$i] <= $target) {
                    // 压入，纵向遍历
                    array_push($solution, $candidates[$i]);
                    $this->dfs($candidates, ($sum+$candidates[$i]), $target, $i+1, $solution);
                    // 弹出，横向遍历
                    array_pop($solution);
                    // 当前节点遍历完标志，遍历下个节点
                    $flag = 1;
                }
            }
        }
    }
}
