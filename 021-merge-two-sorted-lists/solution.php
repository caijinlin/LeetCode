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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
                
        $node = new ListNode(0);
        $head = $node;
        while ($l1 && $l2) {
            if ($l1->val <= $l2->val) {
                $node->next = new ListNode($l1->val);
                $l1 = $l1->next;
            } else {
               $node->next = new ListNode($l2->val);
               $l2 = $l2->next;
            }
            $node = $node->next;
        }
        
        while($l1) {
            $node->next = new ListNode($l1->val);
            $node = $node->next;
            $l1 = $l1->next;
        }
        
        while($l2) {
            $node->next = new ListNode($l2->val);
            $node = $node->next;
            $l2 = $l2->next;
        }
        
        return $head->next;
    }
}
