#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, filecmp,glob
from os import listdir
from os.path import isfile, join

#l1 = ["name","size",3]
#l2 = ["name","size",4]
#os.walk(~)

#print(l3)
#result=list(set(l1) ^ set(l2))
#result1=list(set(l1) & set(l2))
#print(result1[0:2],result[1])
from pathlib import Path
#PATH = os.getcwd()
#PATH = os.system("cd ~ && pwd")
PATH = "/home/moslik/mosl1k.github.io/python/"
for file in Path(PATH).glob('**/*'):
    print(file)