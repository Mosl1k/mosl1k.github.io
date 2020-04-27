#! /usr/bin/env python3.7
# -*- coding: utf-8 -*-

import os, sys, time, datetime, filecmp
from os import listdir
from os.path import isfile, join

l1 = ["name","size",3]
l2 = ["name","size",4]


#print(l3)
result=list(set(l1) ^ set(l2))
result1=list(set(l1) & set(l2))
print(result1[0:2],result[1])
