#!/bin/bash

wget -O - -q icanhazip.com >> /home/moslik/mos/mosl1k.github.io/ismyip.txt 
gnome-terminal -- git add /home/moslik/mos/mosl1k.github.io/ismyip.txt 
gnome-terminal -- git commit -am nip
gnome-terminal -- git push 


