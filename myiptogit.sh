#!/bin/bash

wget -O - -q icanhazip.com >> /home/moslik/mos/mosl1k.github.io/ismyip.txt 
git add /home/moslik/mos/mosl1k.github.io/ismyip.txt
git commit -am nip
git push 


