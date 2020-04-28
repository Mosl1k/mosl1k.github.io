#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, filecmp
from os import listdir
from os.path import isfile, join

scan_path=os.getcwd()
obj1 = []
obj2 = []
nf1 = []
nf2 = []
now = datetime.datetime.now()
def scan(fa):
    print(scan_path + "/" + fa + " ,"+ str(size) + " bytes, " + 'corrected: ' + str(correct))
files1 = [f1 for f1 in listdir(scan_path) if isfile(join(scan_path, f1))]

for fa1 in files1:
    size = int(os.path.getsize(fa1))
    correct = datetime.datetime.fromtimestamp(int(os.path.getmtime(fa1)))
    obj = {"fi":str(fa1),"si":str(size),"co":str(correct)}
    na = {"fi":str(fa1),"si":str(size)}
    nf1.append(na)
    obj1.append(obj)
print ('\n')
time.sleep(7)
files2 = [f2 for f2 in listdir(scan_path) if isfile(join(scan_path, f2))]
for fa2 in files2:
    size = int(os.path.getsize(fa2))
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa2)))
    obj = {"fi":str(fa2),"si":str(size),"co":str(correct)}
    na = {"fi":str(fa2),"si":str(size)}
    nf2.append(na)
    obj2.append(obj)
    for fif in obj1:
        if fif["fi"] == obj["fi"]:
            if fif["co"] != obj["co"]:
                print('corrected:', obj["fi"],obj["co"])		
for obj_add in nf2:
    if obj_add not in nf1:
        print('add:', obj_add["fi"],obj_add["si"], str(now))

for obj_del in nf1:
    if obj_del not in nf2:
        print('del:', obj_del["fi"],obj_del["si"], str(now))

