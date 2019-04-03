#!/bin/bash

wget -O - -q icanhazip.com >> ismyip.txt 
git add ismyip.txt 
git commit -am nip
git push 


