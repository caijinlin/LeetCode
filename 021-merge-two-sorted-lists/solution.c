/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */


struct ListNode* mergeTwoLists(struct ListNode* l1, struct ListNode* l2){
    // calloc = malloc + memset
    // struct ListNode *node = (struct ListNode *)malloc(1 * sizeof(struct ListNode));
    // memset(node, 0, sizeof(struct ListNode));
    
    struct ListNode *node = (struct ListNode *)calloc(1, sizeof(struct ListNode));
    struct ListNode *head = node;
    
    while(l1 || l2) {
        struct ListNode *tmp = (struct ListNode *)calloc(1, sizeof(struct ListNode));
        if (l1 && l2) {
            if (l1->val <= l2->val) {
                tmp->val = l1->val;
                node->next = tmp;
                l1 = l1->next;
            } else {
                tmp->val = l2->val;
                node->next = tmp;
                l2 = l2->next;
            }
        } else if (l1) {
            tmp->val = l1->val;
            node->next = tmp;
            l1 = l1->next;
        } else {
            tmp->val = l2->val;
            node->next = tmp; 
            l2 = l2->next;
        }
        node = node->next;
    }
    
    return head->next;
}

