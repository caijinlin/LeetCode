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
    
    protected $sum = 0;

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function bstToGst($root) {
        return $this->sumTree($root, 0);
    }
    
    function sumTree($root, $sum) {
                
        if ($root == null) {
            return;
        }
        
        if ($root->left == null && $root->right == null) {
            $this->sum += $root->val;
            $root->val = $this->sum;
            return;
        }
        
        // 右/中/左 中序遍历 
        $this->sumTree($root->right, $this->sum);
        
        $this->sum += $root->val;
        $root->val = $this->sum;
            
        $this->sumTree($root->left, $this->sum);
        
        return $root;
    }
}
