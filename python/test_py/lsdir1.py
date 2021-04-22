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

    obj = {"fi":str(fa1),"si":str(size),"co":str(correct)}

    obj1.append(obj)
    #print(obj["fi"])
    #print(str(obj)+'\n')

print ('\n\n\n')

time.sleep(5)

files2 = [f2 for f2 in listdir(scan_path) if isfile(join(scan_path, f2))]

for fa2 in files2:

    size = int(os.path.getsize(fa2))
    correct=datetime.datetime.fromtimestamp(int(os.path.getmtime(fa2)))

    obj = {"fi":str(fa2),"si":str(size),"co":str(correct)}
    #print(obj)
    for fif in obj1:
        if fif["fi"] == obj["fi"]:
            if fif["co"] != obj["co"]:
                print('fififi:', obj["fi"],obj["co"])		
#    for fif in obj1:    
   #     if fif["fi"] not in obj["fi"]:
  #          print('del:', fif["fi"])

        
  #      scan(fa2)

    #    obj2.append(obj)
    #else: 
       
     #   obj2.append(obj)	

#for obj_add in obj2:

 #   if obj_add not in obj1:

  #      print('add:', obj_add)

#for obj_del in obj1:

 #   if obj_del not in obj2:

#        print('del:', obj_del)

