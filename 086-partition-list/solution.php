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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        
        $leftHead  = new ListNode(0);
        $rightHead = new ListNode(0);
        
        $left  = $leftHead;
        $right = $rightHead;
        
        while($head != null) {
            if ($head->val < $x) {
                $left->next = new ListNode($head->val);
                $left = $left->next;
            } else {
                $right->next = new ListNode($head->val);
                $right = $right->next;
            }
            $head = $head->next;
        }   
        
        // 连接两个链表
        $left->next = $rightHead->next;
        
       return $leftHead->next;
    }
}
