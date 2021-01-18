#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, glob
from os import listdir
from os.path import isfile, join
from pathlib import Path

scan_path = "/home/moslik/mosl1k.github.io/"
fa4 = set()
fa5 = set()
now = datetime.datetime.now()
for fa1 in Path(scan_path).glob('**/*'):
    size = int(os.path.getsize(fa1))
    correct = datetime.datetime.fromtimestamp(int(os.path.getmtime(fa1)))
    if isfile(fa1):    
        fa4.add(str(fa1)+' '+str(size)+' '+str(correct))
    
#    print(fa1)    
#    print('\n')
time.sleep(5)
for fa2 in Path(scan_path).glob('**/*'):
    size = int(os.path.getsize(fa2))
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa2)))
    if isfile(fa2):    
        fa5.add(str(fa2)+' '+str(size)+' '+str(correct))
a=(fa4^fa5)
b=(fa4-fa5)
c=(fa5-fa4)
if c==set(): print("del: ", b) #b!=set() and a==b and 
if b==set() and a==c: print("add: ", c) #a==c and 
if c!=set() and a!=c: print("corr: ",c) #a>=b and a>=c and 

now2 = datetime.datetime.now()
    
print(now2-now) 
