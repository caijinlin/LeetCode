class Solution {
    
    protected $solutions = array();

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        sort($nums);
        $this->dfs($nums, array(), 0);
        
        return $this->solutions;
    }
    
    function dfs($nums, $solution, $index) {
        
        array_push($this->solutions, $solution);        
        
        $flag = 0;
        
        for ($i=$index;$i<count($nums);$i++) {
            if ($flag == 1 && $i > 0 && $nums[$i] == $nums[$i-1]) {
                continue;
            }
            array_push($solution, $nums[$i]);
            $this->dfs($nums, $solution, $i+1);
            array_pop($solution);
            $flag = 1; // 表明一个方案已遍历完，开始寻找新一个方案
        }
    }
}
