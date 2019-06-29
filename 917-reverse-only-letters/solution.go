import(
    "fmt"
)

func reverseOnlyLetters(S string) string {
    bs := []byte(S)
    for i,j := 0,len(bs)-1 ; i < j ; {
        for ;!isleeter(bs[i]) && i < j ; {
            i++
        } 
        
        for ;!isleeter(bs[j]) && i < j; {
            j--
        }
                
        // swap
        bs[i], bs[j] = bs[j], bs[i]
        i++
        j--
    }
    
    return string(bs)
}

func isleeter(r byte) bool {
   return (r >= 'a' && r <= 'z') || (r >= 'A' && r <= 'Z')
}
