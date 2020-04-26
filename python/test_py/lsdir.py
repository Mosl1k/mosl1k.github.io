#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, filecmp
from os import listdir
from os.path import isfile, join
scan_path=os.getcwd()

def scan(fa):
    print(scan_path + "/" + fa + " ,"+ str(size) + " bytes, " + 'corrected: ' + str(correct))
#    print('size: ' + )
#    print()

files1 = [f1 for f1 in listdir(scan_path) if isfile(join(scan_path, f1))]
filess1 = []
obj1 = []
obj2 = []
#sizes1 = []
#corrs1 = []
#fal1 = set(filess1)
for fa1 in files1:
    size = int(os.path.getsize(fa1))
    correct = datetime.datetime.fromtimestamp(int(os.path.getmtime(fa1)))
    obj = [str(fa1),str(size),str(correct)]
    obj1.append(obj)
    print(str(obj)+'\n')
#    scan(fa1)
    filess1.append(fa1)
#    sizes1.append(size)

print ('\n\n\n')
#print(filess1)
#print(obj1)

time.sleep(5)

files2 = [f2 for f2 in listdir(scan_path) if isfile(join(scan_path, f2))]
for fa2 in files2:
    size = int(os.path.getsize(fa2))
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa2)))
#    if fa2 not in filess1:
#        scan(fa2)
    obj = [str(fa2),str(size),str(correct)]
    obj2.append(obj)
#print(obj2)

for obj_add in obj2:
    if obj_add not in obj1:
        print('add:', obj_add)

for obj_del in obj1:
    if obj_del not in obj2:
        print('del:', obj_del)
#os.system("diff files1 files2")

#filess2 = []

#for fa in files2:
#    size = int(os.path.getsize(fa))
#    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa)))
#    scan(fa)
#    filess2.append(fa)
#fal2 = set(filess2)
#cmp1 = filecmp.dircmp(str(files1),str(files2))
#print(
#cmp1.report()

#class file:
#    def __init__(self,name,size): #,,correct
#        self.name = name
#        self.size = size
#        self.correct = correct
#    def disp(self):
#        size = int(os.path.getsize(files[1]))
#        print("hi,",self.name,self.size)
#    def size(self):
#        print("size:",self.size)
#file1 = file("map.py","55")
#file1.disp()
#file2 = file(


#print(scan_path)
#while [1]:
#with open("first_file",rw) as ff:
#    ff.write("123")

#from pathlib import Path
#path=sys.argv[1]
#print(path)

#with open("second_file",rw) as ff:

#print(files)
#fil = map(str, files)
#    creat=datetime.datetime.fromtimestamp(int(os.path.getctime(fa)))
#    print('created: ' + str(creat))
    
#ti = os.stat("map.py")
#print(ti)