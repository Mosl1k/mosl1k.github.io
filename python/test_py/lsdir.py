#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, filecmp
from os import listdir
from os.path import isfile, join
scan_path=os.getcwd()

def scan(fa):
    print(scan_path + "/" + fa + " ,"+ str(size) + " bytes, " + 'corrected: ' + str(correct))

files1 = [f1 for f1 in listdir(scan_path) if isfile(join(scan_path, f1))]
obj1 = []
obj2 = []
for fa1 in files1:
    size = int(os.path.getsize(fa1))
    correct = datetime.datetime.fromtimestamp(int(os.path.getmtime(fa1)))
    obj = [str(fa1),str(size),str(correct)]
    obj1.append(obj)
    print(str(obj)+'\n')
print ('\n\n\n')

time.sleep(5)

files2 = [f2 for f2 in listdir(scan_path) if isfile(join(scan_path, f2))]
for fa2 in files2:
    size = int(os.path.getsize(fa2))
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa2)))
    obj = [str(fa2),str(size),str(correct)]
    if obj not in obj1:
        scan(fa2)
        obj2.append(obj)
    else:
        obj2.append(obj)

for obj_add in obj2:
    if obj_add not in obj1:
        print('add:', obj_add)


for obj_del in obj1:
    if obj_del not in obj2:
        print('del:', obj_del)

#        obj_dels.append(obj_del)

#filess1 = []
#    filess1.append(fa1)

#        for i in obj1:
#            for row in i:
                #print(row,'!!!')
#                if row == obj[0]:
#                    if i[2] != obj[2]:
    #if fa2 in filess1:
                    #    if i[0] == obj[0]:
        #print('corr:',obj)
#                        print(i[2])
#        scan(fa2)
#print(filess1[0])
#    scan(fa1)
#    fff1  = file1(fa1,size,correct)
#    fff.disp()
#    sizes1.append(size)
#sizes1 = []
#corrs1 = []
#fal1 = set(filess1)


#print(obj1)
    
#        print(obj[0],obj[2])
#print(set(files2))
#ooo = map(str,obj2)
#lst = list(ooo)
#tup = tuple(lst)
#print(tup[0,1])

#a1 = list(set(obj1) & set(obj2))
#obj3 = list(set(obj2))
#print(obj2[3])

#result1 = tuple(set(obj1) & set(obj2))
#result2 = tuple(set(obj1) ^ set(obj2))

#print(result1,result2)
#obj_adds = []
#obj_dels = []

#        obj_adds.append(obj_add)
#                 print('aaa',obj_add[2])
#    else:
#        for i in obj1:
            #print(i[0])
#            if i[0] == obj_add[0]:
                #print(i[0],i[2])
#                print(obj_add[0],obj_add[2])
#                if obj_add[2] != i[2]:
#                    print('aaa',obj_add[0])
#for alls in obj2:
#    obj1.del(alls)
#print(obj1)

#            if obj_add[2] != obj1[2]:
#   
#if obj_add[0] == obj_del[0]:
#    print('corr:', obj_add[0], obj_add[2])

#        for i in obj1:
#        if obj_add[1] == obj1[1] &&  


#for obj_time in obj2:
#    if obj_time[0] == in obj1:
#        obj_all.append(obj_time)
#        print(obj_time)

#obj_all = []
#obj_all = obj_dels.append(obj_adds)
#res = set(tuple(sorted(l)) for l in obj_all)
#print(res)

#all_obj = list(set(obj_add) ^ set(obj_del) ^ set(obj_time))
#if obj_time == obj_del:
#    print(obj_time)

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
#    print('size: ' + )
#    print()

#class file1:
#    def __init__(self,name,size,corr): #,,correct
#        self.name = name
#        self.size = size
#        self.corr = corr
#    def disp(self):
        #size = int(os.path.getsize(files[1]))
#        print("hi,",self.name,self.size,self.corr)
#file1 = file("map.py","55","22")
#file1.disp()
#file2 = file(
