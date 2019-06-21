/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {
    
    protected $min = PHP_INT_MAX;
    
    protected $pre = -1;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDiffInBST($root) {
        $this->inorderTraversal($root);
        
        return $this->min;      
    }
    
    // 中序遍历
    function inorderTraversal($root) {
        if ($root) {
            $this->inorderTraversal($root->left);
            if ($this->pre != -1) {
                $this->min = min($this->min, $root->val - $this->pre);
            }
            $this->pre = $root->val;
            $this->inorderTraversal($root->right);
        }
    }
}
