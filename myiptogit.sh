#!/bin/bash

wget -O - -q icanhazip.com >> ~/mos/mosl1k.github.io/ismyip.txt 
gnome-terminal -- git add \.
gnome-terminal -- git commit -am nip
gnome-terminal -- git push 


