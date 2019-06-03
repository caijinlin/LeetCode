class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $start = strlen($s) - 1;
        // 最后一个非空字符下标
        while($s[$start] == ' ' && $start > 0) {
            $start--;
        }
        
        $count = 0;
        // 最后一个单词往前遍历
        while ($s[$start] != ' ' && $start >= 0) {
            $count++;
            $start--;
        }
                
        return $count;
    }
}
