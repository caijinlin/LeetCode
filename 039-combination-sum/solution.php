class Solution {
    
    protected $solutions; // all solution
    
    protected $solutionNum; // number of solution
    
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $this->solutions = array();
        $this->solutionNum = 0;
        $this->dfs($candidates, 0 , $target, 0, 0, array());
        
        return $this->solutions;
    }
    
     /**
     * @param Integer[] $candidates 数组
     * @param Integer $sum  one solution sum 
     * @param Integer $target 
     * @param Integer $index  遍历到candidates第index个元素
     * @param Integer $len    当前solution第xxx个元素 
     * @return Integer[] $solution one solution set
     */
    function dfs($candidates, $sum, $target, $index, $len, $solution) {
        if ($sum > $target) {
            return;
        } else if ($sum == $target) {
            // 保存solution
            $this->solutions[$this->solutionNum] = $solution;
            $this->solutionNum++; 
        } else {
            // 只遍历 index 后面的，去重
            for ($i=$index; $i<count($candidates); $i++) {
                // 回溯到父节点状态
                $solution[$len] = $candidates[$i];
                $this->dfs($candidates, ($sum+$candidates[$i]), $target, $i, $len+1, $solution);
            }
        }
    }
}
