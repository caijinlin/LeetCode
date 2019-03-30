void* restore(char *s, int start, int n,  char *addr[], char **addrs, int *returnSize);
bool isValid(char *s);

/**
 * Return an array of size *returnSize.
 * Note: The returned array must be malloced, assume caller calls free().
 */
char** restoreIpAddresses(char* s, int* returnSize) {
    
    int size = strlen(s);
    
    if (size < 4 || size > 12) return NULL;

    int n = (size-1) * (size-2) * (size-3) / 6; // 最大不重复ip个数
    char** addrs = (char**) calloc(n, sizeof(char*));
    for(int i=0;i<n;i++ )
    {
        addrs[i]=(char *) calloc(16, sizeof(char*)); // 每个指针指向一个ip地址
    }
    char *addr[4]; // 4个ip子串
    for (int i=0;i< 4;i++) {
         addr[i] = (char*) calloc(4, sizeof(char*)); // 每个指针指向一个ip子串
    }
    
    restore(s, 0, 0, addr, addrs, returnSize);
        
    return addrs;
}

void* restore(char *s, int start, int n,  char *addr[], char **addrs, int *returnSize) {
	
    if (n >=4) {
        if (start == strlen(s)) {
            for (int i=0;i<4;i++) {
                strcat(addrs[*returnSize], addr[i]);
            }
            (*returnSize)++;
        } else {
            return NULL;
        }
    }
    int size = strlen(s);
    
    // 每个ip可能有三种组合，1位数，2位数，3位数
    for (int i=start; i < start +3 && i < size; i++) {
        char *p = (char *)calloc(i-start+2, sizeof(char));
        p[i-start+1] = '\0';
        memcpy(p, s+start, i-start+1);
        printf("第%d串, start：%d, 子串:%s\n", n+1, start, p);
        if (isValid(p)) {          
            // 子ip加入到ip地址中
            strcpy(addr[n], p);
            // 最后一个子串不增加.
            if (n != 3) {
                strcat(addr[n], ".");
            }
            // 递归前进
            restore(s, i+1, n+1, addr, addrs, returnSize);
        } 
    }
    
    return NULL;
}

bool isValid(char *s) {
    
    int size = strlen(s);
    int num = 0;
    
    // 010 不合格
    if (*s == '0' && size != 1) {
        return false;
    }
    
    for (int i = 0; i < size; i++) {
        num = num*10 + (s[i] - '0');
    }
    
    return num >= 0 && num <= 255;
}
