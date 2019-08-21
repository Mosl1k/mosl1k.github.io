#!/bin/bash

XS=900
XE=1200
YS=600
YE=900

colour=0
grabc 1>CV1 2>/dev/null &
sleep 1
xdotool mousemove --sync 995 695 click 1
sleep 1
FI=`cat CV1`
echo ищем $FI
for  y in {690..700..1} ; do
for  x in {990..1000..1} ; do
		grabc 1>CV 2>/dev/null & # & #1>colour 
		xdotool mousemove --sync $x $y click 1 #sleep 0.1
		eval $(xdotool getmouselocation --shell)
		echo $X,$Y
		colour=`cat CV`
	    	echo  y=$y x=$x тут $colour искомый $FI not found
		if [[ $colour = $FI ]]; then
		echo тут $colour искомый $FI FOUND
		exit 0
		fi
done
done


#$XS $XE $YS $YE


