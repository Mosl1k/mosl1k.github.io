#!/bin/bash

a=`wget -O - -q icanhazip.com`
echo $a > ismyip.txt 
git add . 
git commit -am "ip" 
git push 


