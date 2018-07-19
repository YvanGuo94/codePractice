#!/usr/bin/python
# -*- coding: utf-8 -*-
from time import *
def orginal_algorithm(a,b,c):  #a^b%c
    ans=1
    a=a%c  #预处理，防止出现a比c大的情况
    for i in range(b):
        ans=(ans*a)%c
    return ans

def quick_algorithm(a,b,c):
    a=a%c
    ans=1
    #这里我们不需要考虑b<0，因为分数没有取模运算
    while b!=0:
        if b&1:
            ans=(ans*a)%c
        b>>=1
        a=(a*a)%c
    return ans

time=clock()
a=eval(input("底数:"))
b=eval(input("指数:"))
c=eval(input("模:"))
print("朴素算法结果%d"%(orginal_algorithm(a,b,c)))
print("朴素算法耗时:%f"%(clock()-time))
time=clock()
print("快速幂算法结果%d"%(quick_algorithm(a,b,c)))
print("快速幂算法耗时:%f"%(clock()-time))

