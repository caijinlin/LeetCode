class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
       $result = array();
       foreach($strs as $str) {
           $hash = array();
           for ($i=0;$i<strlen($str);$i++) {
               $hash[] = ord($str[$i]) - ord('a');
           }
           
           sort($hash);
           
           $result[implode(',', $hash)][] = $str;          
       }   
                
       return $result;
    }
}
