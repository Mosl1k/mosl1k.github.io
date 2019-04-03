#!/bin/bash

wget -O - -q icanhazip.com > /home/moslik/mos/mosl1k.github.io/ismyip.txt 
`date` > /home/moslik/mos/mosl1k.github.io/lasttime.txt 
cd /home/moslik/mos/mosl1k.github.io/
git add .
git commit -am nip
git push 


