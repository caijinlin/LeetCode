class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
                
        $i = strlen($a)-1;
        $j = strlen($b)-1;
        
        $flag = 0; // 标志是否进一位
        $str = "";
        
        while($i >= 0 || $j >= 0) {
            
            $sum = $flag;
            if ($i >= 0) {
                $sum += $a[$i] - '0';
            }
            if ($j >= 0) {
                $sum += $b[$j] - '0';
            }
            $str = $sum%2 . $str;
            $flag = (int) ($sum/2);
            $i--;
            $j--;
        }
        
        if ($flag > 0) {
            $str = $flag . $str;
        }
        
        return $str;
    }
}
