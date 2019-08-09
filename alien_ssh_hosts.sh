#!/bin/bash

pathto=~/
pack=python-pip-9.0.1-3.3.noarch.rpm
user=mosl1k
while read HOSTADDR
do
    rsync $pathto/$pack $HOSTADDR:/home/$user/tmp
	echo "пакет скопирован"
    ssh -tt -n $user@$HOSTADDR sudo alien -i -c /home/$user/tmp/$pack
	echo "конвертирован"
done < <(grep -o '^[0-9]\+\(\.[0-9]\{1,3\}\)\{3\}' /etc/hosts | grep -v '^127')
echo "все пакеты на хостах установлены"
	



	