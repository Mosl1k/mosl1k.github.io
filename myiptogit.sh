#!/bin/bash

wget -O - -q icanhazip.com >> /home/moslik/mos/mosl1k.github.io/ismyip.txt 

cd /home/moslik/mos/mosl1k.github.io/
git add ismyip.txt
git commit -am nip
git push 


