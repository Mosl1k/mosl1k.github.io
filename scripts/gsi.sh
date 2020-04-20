#!/bin/bash

day=`date +%d%m%y`
mksquash(){
>parts;
# saving logs
sfdisk --dump /dev/$disk1 > $disk1.dmp
mkdir ./logs/ 2>/dev/null
fdisk -l /dev/$disk1 > ./logs/log_fdisk
blkid > ./logs/blkid_log
cat /proc/partitions > ./logs/log_partitions
lshw > ./logs/log_lshw
lscpu > ./logs/log_lscpu
lsblk > ./logs/log_lsblk
#cat /etc/fstab > ./logs/log_fstab
#cat /etc/mtab > ./logs/log_mtab
#cat /etc/group > ./logs/log_group
#cat /etc/shadow > ./logs/log_shadow
# geting all partitions without extanded
lsblk |grep $disk1 |grep part |awk {'print $1'} >allparts
for i in `cat allparts`; do
    part=`echo -n $i | tail -c +7`
    fdisk -l |grep $part | awk '{if($6!="5" ) print $1}' >> parts
done

# writing zero's in this partitions
for p in `cat parts`;do
    npart=`echo $p | tail -c +6`
    mkdir /tmp/$npart 2>/dev/null
    mount $p /tmp/$npart
    ls /tmp/$npart
# take squasfsh from all partitions
    mksquashfs /tmp/$npart ./$npart.squashfs 
#    dd if=/dev/zero of=/tmp/$npart/rmfile status=progress;  sync
#    rm -rf /tmp/$npart/rmfile;  sync
    umount /tmp/$npart 
done
echo -n "last step, compressing data in archive"
    ls ./*.squashfs parts $disk1.dmp > lspack 
    tar -czf ./$disk1$day.tgz ./*.squashfs lspack parts $disk1.dmp ./logs/*; sync
    rm -rf ./*.squashfs parts allparts lspack $disk1.dmp ./logs/*;
    rmdir ./logs; sync
#    gzip -9cf ./*.squashfs parts $disk1$day.dmp > $disk1$day.gz
# clone full disk space in archive with dd
#./getFSimage.sh $disk1
echo "   DONE"
}
case "$1" in
sda)
disk1=$1; mksquash;;
sdb)
disk1=$1; mksquash;;
sdc)
disk1=$1; mksquash;;
sdd)
disk1=$1; mksquash;;
sde)
disk1=$1; mksquash;;
disk)
echo -n "введите свое значение: "; $PS1; read; disk1=$REPLY; mksquash;;
*)
echo "введите, в качестве параметра, название блочного устройства (без /dev/)"
echo "пример: $0 $@ sda(sdb,sdc,sdd,sde)"
echo "или введите disk, чтобы указать иное значение после запуска скрипта"
exit 1
;;
esac
