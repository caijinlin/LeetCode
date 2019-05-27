class Solution {
    
    protected $solutions;
    
    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        $this->solutions = array();
        $candidates = array();
        for ($i=1;$i<=9;$i++) {
            $candidates[$i-1] = $i;
        }
        $this->dfs($candidates, 0, $n, $k, 0, array());
        
        return $this->solutions;
    }
    
     /**
     * @param Integer[] $candidates 数组
     * @param Integer $sum  one solution sum 
     * @param Integer $target 
     * @param Integer $k 一个solution包含k个数
     * @param Integer $index  遍历到candidates第index个元素
     * @return Integer[] $solution one solution set
     */
    function dfs($candidates, $sum, $target, $k, $index, $solution) {
        
        if ($sum == $target && (count($solution) == $k)) {
            // 保存solution
            array_push($this->solutions, $solution);
            return;
        }
        
        // 只遍历 index 后面的，去重
        for ($i=$index; $i<count($candidates); $i++) {
            if ($sum+$candidates[$i] > $target) {
                break;
            }
            // 回溯到父节点状态
            array_push($solution, $candidates[$i]);
            $this->dfs($candidates, ($sum+$candidates[$i]), $target, $k, $i+1, $solution);
            array_pop($solution);
        }
    }
}
