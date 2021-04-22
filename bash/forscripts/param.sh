#!/bin/bash

banary=`echo $1`
name_part=`echo $1$2`
mount_dir=`echo $3`

mounting(){
###
echo "mount -o lopp,offset= ./$name_part $mount_dir" #${512*$first}
while [ 1 ]; do
read -s -n 1 -p "press Q to exit or R to reboot" keypress
    if [ $keypress == q 2>/dev/null ]; then
    echo 'exit 1'
    fi
    if [ $keypress == r 2>/dev/null ]; then
    echo 'reboot'
    fi
    echo
done
}
third(){
if ! [ -d $mount_dir ]; then
mkdir $mount_dir 2>/dev/null
    if ! [ -d $mount_dir ]; then
    echo "3 parametr not suplied, usage defult dirrectory /tmp/mnt"
    mkdir /tmp/mnt 2>/dev/null
    mount_dir=/tmp/mnt
    mounting
    else
    mounting
    fi
elif [ -d $mount_dir ]; then
    if [ -f $mount_dir$banary ]; then
    echo "usage defult dirrectory /tmp/mnt"
    mkdir /tmp/mnt 2>/dev/null
    mount_dir=/tmp/mnt
    mounting
    else
    mounting
    fi
fi
}
case $1 in
-h)
echo "usage:"
echo "$0 binary 1 /dir "
;;
$1)
    if [ -z "$1" ]; then
	echo "No arg supplied, usage: $0 -h"
    else
#	echo telo
	if ! [ -f $binary ]; then
	echo "no $binary in "`pwd`
	else
		case $2 in
		$2)
		    if [ -z "$2" ]; then
	        	echo "No 2 arg supplied, usage: $0 -h"
		    else
#		    echo telo
			case $3 in
		        $3)
				if [ -z "$3" ]; then
				echo "No 3 arg supplied, usage: $0 -h"
				else
				echo telo
				third
				fi
		        ;;
		        esac
		    fi
		;;
		esac
	fi
    fi
;;
esac

#if [ -z "$1" ]
#    then
#	echo "No arg supplied, usage: $0 -h"
#else
#echo telo
#fi

#if [ $# -eq 0 ]
#    then
#	echo "No arg supplied, usage: $0 -h"
#else
#echo telo
#fi
