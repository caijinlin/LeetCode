class Solution {

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion($version1, $version2) {
        
        $arr1 = explode('.', $version1);
        $arr2 = explode('.', $version2);
        
        $len1 = count($arr1);
        $len2 = count($arr2);
        
        $len = min($len1, $len2);
                
        for($i=0;$i<$len;$i++) {
            $num1 = intval($arr1[$i]);
            $num2 = intval($arr2[$i]);
            if ($num1 == $num2) {
                continue;
            } else if ($num1 > $num2) {
              return 1;
            } else if ($num1 < $num2) {
                return -1;
            }
        }
        
        for($i=$len;$i<$len1;$i++) {
            if ($arr1[$i] != 0) {
                return 1;
            }
        }
        
        for($i=$len;$i<$len2;$i++) {
            if ($arr2[$i] != 0) {
                return -1;
            }
        }
        
        return 0;
    }
}
