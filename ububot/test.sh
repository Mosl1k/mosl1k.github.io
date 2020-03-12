#!/bin/bash

#XS=900
#XE=1200
#YS=600
#YE=900

#colour=0
#grabc 1>CV1 2>/dev/null &
#sleep 1
#xdotool mousemove --sync 995 695 click 1
#sleep 1
#FI=`cat CV1`
#echo ищем $FI
while [ 1 ] ; do


#xdotool mousemove --sync 1009 473
gnome-screenshot -f /tmp/copycolor.png
#eval $(xdotool getmouselocation --shell)
IMAGE=`convert /tmp/copycolor.png -depth 8 -crop 1x1+1009+473 txt:-`
COLOR=`echo $IMAGE | grep -om1 '#\w\+'`
echo -n $COLOR | xclip -i -selection CLIPBOARD

IMAGE1=`convert /tmp/copycolor.png -depth 8 -crop 1x1+986+446 txt:-`
COLOR1=`echo $IMAGE1 | grep -om1 '#\w\+'`
echo -n $COLOR1 | xclip -i -selection CLIPBOARD

IMAGE2=`convert /tmp/copycolor.png -depth 8 -crop 1x1+992+448 txt:-`
COLOR2=`echo $IMAGE2 | grep -om1 '#\w\+'`
echo -n $COLOR2 | xclip -i -selection CLIPBOARD


if [ $COLOR == '#FC362BFF' ]; then
    xdotool mousemove --sync 1786 139 click 1
    sleep 10
    xdotool mousemove --sync 632 230 click 1
    sleep 10
    xdotool mousemove --sync 1007 446 click 1
    sleep 10
    xdotool mousemove --sync 681 194 click 1
    sleep 10
    xdotool mousemove --sync 1372 694 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 
elif [ $COLOR1 == '#FBEAB7FF' ]; then
    xdotool mousemove --sync 1786 139 click 1
    sleep 10
    xdotool mousemove --sync 632 230 click 1
    sleep 10
    xdotool mousemove --sync 1007 446 click 1
    sleep 10
    xdotool mousemove --sync 681 194 click 1
    sleep 10
    xdotool mousemove --sync 1372 694 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 
elif [ $COLOR2 == '#2B261CFF' ]; then
    xdotool mousemove --sync 1786 139 click 1
    sleep 10
    xdotool mousemove --sync 632 230 click 1
    sleep 10
    xdotool mousemove --sync 1007 446 click 1
    sleep 10
    xdotool mousemove --sync 681 194 click 1
    sleep 10
    xdotool mousemove --sync 1372 694 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 click 1 
fi

for y in {500..709..20} ; do
for x in {1100..1356..20} ; do
		grabc 1>CV 2>/dev/null & # & #1>colour 
		xdotool mousemove --sync $x $y click 1 click 1 #sleep 1
		eval $(xdotool getmouselocation --shell)
		#./working.sh 
		#echo $X,$Y
		#colour=`cat CV`
	    	#echo  y=$y x=$x тут $colour искомый $FI not found
		#if [[ $colour = $FI ]]; then
		#echo тут $colour искомый $FI FOUND
		#exit 0
		#fi

done
done


done

#$XS $XE $YS $YE


