/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        
        $n = 1;
        
        $p = $head;
        
        while($p->next && $n++) {
            $p = $p->next;
        }
        
        $p->next = $head; // 形成环
        
        if ($n == 0) {
            return $head;
        }
        
        // 反转n次就恢复到初始状态
        $k = $k%$n;
        
        $q = $head;
        
        for ($i=1;$i<=$n-$k;$i++) {
            $p  = $q;
            $q = $q->next;
        }
        
        $p->next = null;
        $head = $q;
        
        return $head;
    }
}
