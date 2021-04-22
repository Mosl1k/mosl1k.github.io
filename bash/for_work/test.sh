#!/bin/bash

fdisk -l | grep /dev/...: >disks
echo "all disks:"
cat disks|awk {'print $2 $3 $4'}
echo "select:"
select disk in `cat disks|awk {'print $2'}`
do
selected_disk=`cat disks|grep $disk |awk {'print $2'}| head -c +8`
echo $selected_disk selected
rm disks
exit 0
done