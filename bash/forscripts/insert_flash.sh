#!/bin/bash

lsblk |grep disk| awk '{print $1}' > ./input1
input1=`tail -n 1 ./input1`
while [ 1 ]
do
lsblk |grep disk| awk '{print $1}' > ./input2
input2=`tail -n 1 ./input2`
    while [ $input1 = $input2  ]
    do
	echo "insert flash"
	sleep 2
	lsblk |grep disk| awk '{print $1}' >  ./input2
	echo "insert flash"
	input2=`tail -n 1 ./input2`
	sleep 2 
    done
	echo $input2
	echo "OK"
rm ./input*
done
