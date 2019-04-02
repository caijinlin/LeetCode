/**
 * Definition for a binary tree node.
 * struct TreeNode {
 *     int val;
 *     struct TreeNode *left;
 *     struct TreeNode *right;
 * };
 */
/**
 * Return an array of size *returnSize.
 * Note: The returned array must be malloced, assume caller calls free().
 */
int* inorderTraversal(struct TreeNode* root, int* returnSize) {
    int *result = (int *)calloc(100, sizeof(int)); // 保存结果的数组
    if (root) {
        dsf(root, result, returnSize);
    }
    
    return result;
}

/*
* 中序遍历
*/
void dsf(struct TreeNode* root, int* result, int *index) {
    if (root->left) {
        dsf(root->left, result, index);
    }
    result[*index] = root->val;
    (*index)++;
    if (root->right) {
        dsf(root->right, result, index);
    }
}
