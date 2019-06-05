class Solution {
    
    protected $solutions = array();

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->dfs($nums, array(), 0);
        
        return $this->solutions;
    }
    
    function dfs($nums, $solution, $index) {
        
        array_push($this->solutions, $solution);
        
        for ($i=$index;$i<count($nums);$i++) {
            array_push($solution, $nums[$i]);
            $this->dfs($nums, $solution, $i+1);
            array_pop($solution);
        }
        
    }
}
