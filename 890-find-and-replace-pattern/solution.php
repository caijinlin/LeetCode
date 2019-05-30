class Solution {

    /**
     * @param String[] $words
     * @param String $pattern
     * @return String[]
     */
    function findAndReplacePattern($words, $pattern) {
        
        $result = array();
        
        foreach ($words as $word) {
            if ($this->matchWord($word, $pattern) == true) {
                $result[] = $word;
            }
        } 
        
        return $result;
    }
    
    function matchWord($word, $pattern) {
        if (strlen($word) != strlen($pattern)) {
            return false;
        }
        
        $hash1 = array();
        $hash2 = array();
        
        $index1 = 0;
        $index2 = 0;
        
        $str1 = "";
        $str2 = "";
        
        for ($i=0;$i<strlen($word);$i++) {
            if (!isset($hash1[$word[$i]])) {
                $hash1[$word[$i]] = $index1;
                $str1 .= $index1;
                $index1++;
            } else {
                 $str1 .= $hash1[$word[$i]];
            }
            if (!isset($hash2[$pattern[$i]])) {
                $hash2[$pattern[$i]] = $index2;
                $str2 .= $index2;
                $index2++;
            } else {
                 $str2 .= $hash2[$pattern[$i]];
            }
        }
                
        return $str1 == $str2;
    }
}
