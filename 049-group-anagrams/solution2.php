class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
       $result = array();
       foreach($strs as $str) {
           $x = 1;
           $y = 1;
           for ($i=0;$i<strlen($str);$i++) {
               $x *= ord($str[$i]);
               $y += ord($str[$i]);
           }
                 
           // n个数积相同并且和相同，则n个数完全一致
           $hashKey = $x . '#' . $y;
           $result[$hashKey][] = $str;          
       }   
                
       return $result;
    }
}
