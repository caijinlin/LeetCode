class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        
        if ($num1 == '0' || $num2 == '0') {
            return '0';
        }
        
        $result = array();
        // 乘法的本质是加法
        for ($i=strlen($num1)-1;$i>=0;$i--) {
            for($j=strlen($num2)-1;$j>=0;$j--) {
                $index = $j + $i + 1;
                $value = $result[$index] + ($num1[$i] - '0') * ($num2[$j] - '0');
                $result[$index] = $value%10;
                $result[$index-1] += intval($value/10);
            }
        }

        $str = "";
        for($i=0;$i<count($result);$i++) {
            if ($i==0 && $result[$i] == 0) {
                continue;
            }
            $str .= $result[$i] + '0';
       }

        return $str;
    }
}
