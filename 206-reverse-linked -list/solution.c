/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */
struct ListNode* reverseList(struct ListNode* head) {
   
    if (head == NULL) {
        return head;
    }
    
    struct ListNode *p = head;
    struct ListNode *q = head->next;
    
    while(q) {
      struct ListNode *tmp = q->next;
      q->next = p;
      p = q;
      q = tmp;
      if (q == NULL) {
          head->next = NULL;
          head = p;
      }
    }
    
    return head;
}
