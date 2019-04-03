#!/bin/bash

wget -O - -q icanhazip.com >> ~/mos/mosl1k.github.io/ismyip.txt 
gnome-terminal -- git add ~/mos/mosl1k.github.io/ismyip.txt && git commit -am nip && git push 


