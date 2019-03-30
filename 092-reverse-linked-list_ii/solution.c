/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */

struct ListNode* reverseBetween(struct ListNode* head, int m, int n) {
                   
    if (head->next == NULL || m == n) {
        return head;
    }
    
    struct ListNode *p = head; // 轮询节点
    struct ListNode *q = head->next; // 轮询节点next
    
    struct ListNode * node_m = head; // 第m个节点
    struct ListNode * node_m_prev = NULL; // 第m个节点的前置节点 
    
    for (int i=1;i<m;i++) {
        node_m_prev = p;
        node_m = p->next;
        
        p = node_m;
        q = node_m->next;
    }
    
    for (int index=0; index < n-m; index++) {
        struct ListNode *tmp = q->next;
        q->next = p;    
        p = q;
        q = tmp;
    }
    
    node_m->next = q;
        
    if (node_m_prev != NULL) {
        node_m_prev->next = p;
    } else {
        head = p; // head 反向
    }
    
    return head;
}
