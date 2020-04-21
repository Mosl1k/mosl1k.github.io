#! /usr/bin/env python
# -*- coding: utf-8 -*-

import os, sys, datetime
from os import listdir
from os.path import isfile, join
#from pathlib import Path
#path=sys.argv[1]
#print(path)
scan_path=os.getcwd()
#print(scan_path)
#while [1]:
#with open("first_file",rw) as ff:
#    ff.write("123")

files = [f for f in listdir(scan_path) if isfile(join(scan_path, f))]


def scan(fa):
    print(scan_path + "/" + fa + " ")
    size = int(os.path.getsize(fa))
    print('size: ' + str(size) + " bytes")
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa)))
    print('corrected: ' + str(correct))
    
for fa in files:
	scan(fa)


#with open("second_file",rw) as ff:

#print(files)
#fil = map(str, files)
#    creat=datetime.datetime.fromtimestamp(int(os.path.getctime(fa)))
#    print('created: ' + str(creat))
    
#ti = os.stat("map.py")
#print(ti)