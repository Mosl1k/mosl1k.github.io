#!/bin/bash

start{
a=`wget -O - -q icanhazip.com` && echo $a > ismyip.txt && git add . && git commit -am "ip" && git push ;
}
wait=1
start()

