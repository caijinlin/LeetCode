/**
 * Definition for a binary tree node.
 * struct TreeNode {
 *     int val;
 *     struct TreeNode *left;
 *     struct TreeNode *right;
 * };
 */
void dfs(struct TreeNode* root, int sum, int *res) {
    if (!root) {
        return;
    }
    
    if (root->val == sum) {
        (*res)++;
    }
    
    dfs(root->left, sum-root->val, res);
    dfs(root->right, sum-root->val, res);   
}

void travChildren(struct TreeNode* root, int sum, int *res) {
    // 从上往下
    if (!root) {
        return 0;
    }
    dfs(root, sum, res);
    if (root->left) {
        travChildren(root->left, sum, res);
    }
    if (root->right) {
        travChildren(root->right, sum, res);
    }
}

int pathSum(struct TreeNode* root, int sum){
    
    int res = 0;
    
    travChildren(root, sum, &res);
        
    return res;
}

