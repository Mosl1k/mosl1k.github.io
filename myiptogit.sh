#!/bin/bash

`wget -O - -q icanhazip.com` > ismyip.txt 
git add . 
git commit -am "ip" 
git push 


