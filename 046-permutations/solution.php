class Solution {

  protected $solutions;

  /**
   * @param Integer[] $nums
   * @return Integer[][]
   */
  function permute($nums) {
      $this->solutions = array();
      $this->dfs($nums, array());

      return $this->solutions;
  }

  function dfs($nums, $solution) {
      if (count($solution) == count($nums)) {
          array_push($this->solutions, $solution);
          return;
      }
      for ($i=0; $i<count($nums);$i++) {
          // 去重
          if (in_array($nums[$i], $solution)) {
              continue;
          }
          array_push($solution, $nums[$i]);
          $this->dfs($nums, $solution);
          array_pop($solution);
      }
  }
}
