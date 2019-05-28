class Solution {
    
    protected $solutions;
    
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
      $this->solutions = array();
        
      // 针对重复元素数组基本要排序  
      sort($nums);  
                
      $this->dfs($nums, array(), array(0), 0);
        
      return $this->solutions; 
    }
    
    function dfs($nums, $solution, $visited, $index) {
        
      $flag = 0;
      $lastnum = 0;
              
      if (count($solution) == count($nums)) {
          array_push($this->solutions, $solution);
          return;
      }
      for ($i=0; $i<count($nums);$i++) {
          // 检查去重
          if ($flag != 0 && $i > 0 && $nums[$i] == $lastnum) {
              continue;
          }
          
          if ($visited[$i] == 0) {
              $visited[$i] = 1;
              array_push($solution, $nums[$i]);
              $this->dfs($nums, $solution, $visited, $i+1);
              array_pop($solution);
              $visited[$i] = 0;
              $flag = 1;
              // 上一个num的值
              $lastnum = $nums[$i];
          }          
      }
  }
}
