class Solution {    
    
    function factorial($n) {
        $sum = 1;
        
        for ($i=1;$i<=$n;$i++) {
            $sum *= $i;
        }
        
        return $sum;
    }
    
    function delarr($arr, $val) {
        $result = [];
        foreach ($arr as $value) {
            if ($value !=  $val) {
                $result[] = $value;
            }
        }
        
        return $result;
    }
    

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) {
        
        $res = $this->getKthTreePath($n, $k);
        
        return implode("", $res);
    }
    
    /**
    * 获取第k条由n个节点组成的路径
    */
    function getKthTreePath($n, $k) {
        
        $result = array();
        
        // 初始化n个节点元素
        for($i=0;$i<$n;$i++) {
            $arr[$i] = $i+1;
        }
        
        // 获取第k条由n个节点组成的路径
        for($i=1;$i<=$n;$i++) {
           
            // 从当前根节点出发含有多少个到叶子节点的路径
            $fn = $this->factorial($n-$i);
            // 获取根节点index，向下取整
            $index = ceil($k/$fn);
            
            // 只剩下一个元素
            if ($index == 0) {
                $index = 1;
            }
                        
            $result[$i-1] = $arr[$index-1];
           
            // 向下层遍历，节点减少
            $arr = $this->delarr($arr, $arr[$index-1]);
            
            // 第k条路径
            $k = $k - ($index - 1) * $fn;
        }
        
        return $result;
    }
}
