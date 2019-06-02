#!/bin/bash

cd /home/moslik/mosl1k.github.io/
wget -O - -q icanhazip.com > ismyip.txt 
echo `date` >> ismyip.txt 
git add .
git commit -am nip
git push 


