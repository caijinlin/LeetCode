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

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
                
      $min = PHP_INT_MIN;
      $max = PHP_INT_MAX;
                
      return $this->isValidTree($root, $min, $max);
    }
    
    function isValidTree($root, $min, $max) {
        if ($root == null) {
            return true;
        }
        
        if (!$root->left && !$root->right) {
            return true;
        }
        
        if ($root->left != null && !($root->left->val < $root->val && $root->left->val > $min)) {
            return false;
        }
        
        if ($root->right != null && !($root->right->val > $root->val && $root->right->val < $max)) {
            return false;
        }

        return $this->isValidTree($root->left, $min, $root->val) 
            && $this->isValidTree($root->right, $root->val, $max);
    }
}
