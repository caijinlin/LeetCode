func countSegments(s string) int {
    count := 0
    
    for k, v := range s {
        if v != ' ' && (k == 0 || s[k-1] == ' ') {
            count++;
        }
    }
    
    return count
}
