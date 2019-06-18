class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $len  = count($s);
        $i = 0;
        while ($i < $len/2) {
           $this->swap($s[$i], $s[$len-$i-1]);
           $i++;
        }
    }
    
    function swap(&$a, &$b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
}
