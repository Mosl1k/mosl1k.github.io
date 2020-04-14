#!/bin/bash

# скрипт предназначен для Ubuntu 16+, он монтирует
# (выбранный, в ходе выполнения скрипта)
# раздел из созданного ранее, образа разделов диска

obraz=`echo $1` #имя образа
disk1="sdc"
path=`pwd`
ys(){
sleep 3 && xdotool key y Return &
}
unsquash(){
>nparts
#mkdir ./workdir/ 2>/dev/null
tar -xzf $obraz parts lspack
dmpf=`cat lspack | grep dmp`
tar -xzf $obraz $dmpf
#gunzip -cd $obraz | dd of=./workdir/ status=progress
sfdisk /dev/$disk1  < $dmpf ; sync ; partprobe
lsblk |grep $disk1 |grep part |awk {'print $1'} >allparts
for i in `cat allparts`; do
    part=`echo -n $i | tail -c +7`
    fdisk -l |grep $part | awk '{if($6!="5" ) print $1}' >> nparts
done


for p in `cat nparts`;do
    npart=`echo $p | tail -c +6`
    ys
    mkfs.ext4 $p;
    sync ; partprobe;
    mkdir /tmp/$npart 2>/dev/null
    sleep 2
    mount $p /tmp/$npart ; sync
    num=`echo $p | tail -c +9`
    olddisk=`cat lspack | grep dmp | head -c 3`
    birnimg="$olddisk$num.squashfs"
    tar -xzf $obraz ./$birnimg && unsquashfs -f -d /tmp/$npart $path/$birnimg  ; sync
    rm $birnimg
    umount /tmp/$npart ; sync
done
rm -rf nparts $dmpf lspack parts allparts
}
param2(){
case "$2" in
sda)
disk1=$2;
unsquash
;;
sdb)
disk1=$2;
unsquash
;;
sdc)
disk1=$2;
unsquash
;;
sdd)
disk1=$2; 
unsquash
;;
sde)
disk1=$2; 
unsquash
;;
#disk)
#echo -n "введите свое значение: "; $PS1; read; disk1=$REPLY; unsquash;;
#*)
#echo "введите, в качестве второго параметра, название блочного устройства (без /dev/)"
#echo "пример: $0 $obraz sda(sdb,sdc,sdd,sde)"
#echo "или введите disk, чтобы указать иное значение после запуска скрипта"
#exit 1 ;;
esac 
}

#case "$1" in 
#-h)
# если введен данный параметр, то будет такая справка:
#echo; echo "образ диска должен лежать в текущей дирректории!";
#echo; echo "1-й параметр - образ диска";
#echo; echo "2-й параметр - имя блочного устройства, куда будем распаковывать";
#echo "пример: $0 ";
#echo
#exit 1
#;;
#$1)
# если имя образа ввели верно, и он есть в указанном каталоге, то запустится функция проверки вторго параметра 
#test -f ./$obraz && param2 || echo "нет такого файла $obraz в текущей директории, для вызова справки введите $0 -h"
#;;
#esac
unsquash
