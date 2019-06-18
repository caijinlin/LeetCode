
int countSubstrings(char * s){
        int len = strlen(s);
        
        if (len == 0) {
            return 0;
        }

        int dp[len][len];
        
        // init
        for (int i=0;i<len;i++) {
            for (int j=0;j<len;j++) {
                dp[i][j] = 0;
            }
        }
       
        int sum = 0;
        
        // 包含一个元素的子串
        for (int i=0;i<len;i++) {
            dp[i][i] = 1;
            sum++;
        }
        
        // 包含两个元素的子串
        for (int i=0,j=1;i<len-1 && j<len;i++,j++) {
            if (s[i] == s[j]) {
                dp[i][j] = 1;
                sum++;
            }
        }
        
        // 包含三个及以上元素的子串
        for (int substrlen=2;substrlen<=len;substrlen++) {
            for(int i=0,j=substrlen-1;j<len;i++,j++) {
                if (s[i] == s[j] && dp[i+1][j-1]) {
                    dp[i][j] = 1;   
                    sum++;
                }
            }
        }
    
        return sum;
};

