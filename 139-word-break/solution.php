class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        $len = strlen($s);
        $dp = array();
        $dp[0] = true;
        
        for($i=1;$i<=$len;$i++) {
            // 一个蛋糕可以看切几刀
            for($j=0;$j<$i;$j++) {
                if ($dp[$j] && in_array(substr($s, $j, $i-$j), $wordDict)) {
                    $dp[$i] = true;
                    break;
                }                
            }
        }
        
        return $dp[$len];
        
    }
}
