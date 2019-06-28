/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */


func pathSum(root *TreeNode, sum int) [][]int {
    res := make([][]int, 0)
    tmp := make([]int, 0)
    dfs(root, &res, tmp, 0, sum)
    return res
}

func dfs(root *TreeNode, res *[][]int, path []int, sum int, target int)  {
        
    if root == nil {
        return 
    }
        
    path = append(path, root.Val) 
    sum += root.Val
    
    if (root.Left != nil) {
        dfs(root.Left, res, path, sum, target)
    }
    if (root.Right != nil) {
        dfs(root.Right, res, path, sum, target)
    }
    
    if root.Left == nil && root.Right == nil {
        if sum == target {
            pathDeepCopy := make([]int, len(path))
            copy(pathDeepCopy, path)
            // must use copy, because path is value not refrence 
            *res = append(*res, pathDeepCopy)
        }
    }
            
    return 
}
