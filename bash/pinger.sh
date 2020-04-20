ifconfig |grep -w inet | awk {'print $2'} > ./111.txt
i=1
while [ $i -ne 4 ]; do
while [ read $@ ]; do
adr=`head -n 1 $@`
echo $adr
ping -w 3 $adr
echo $i && $((i++))
done
done < ./111.txt
