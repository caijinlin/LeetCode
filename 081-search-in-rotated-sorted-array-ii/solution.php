class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target) {
       $i = 0;
       $j = count($nums)-1;
       while($i <= $j) {
           $mid = intval(($i+$j)/2);
           if ($nums[$mid] == $target) {
               return true;
           } 
           
           if ($nums[$mid] == $nums[$i]) {
               $i++;
               continue;
           }
           
           if ($nums[$mid] == $nums[$j]) {
               $j--;
               continue;
           }
                     
            // left sorted
           if ($nums[$i] < $nums[$mid]) {
               if ($target >= $nums[$i] && $target < $nums[$mid]) {
                   $j = $mid - 1;
               } else {
                   $i = $mid + 1;
               }
           } else if ($nums[$mid] < $nums[$j]) {
                if ($target > $nums[$mid] && $target <= $nums[$j]) {
                   $i = $mid + 1;
               } else {
                   $j = $mid - 1;
               }
           } else {
               $i++;
           }
       }
        
       return false;
    }
}
