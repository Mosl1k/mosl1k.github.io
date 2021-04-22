#!/bin/bash
# Get hex rgb color under mouse cursor, put it into clipboard and create a
# notification.

#scrot /tmp/copycolor.png

#xdotool mousemove --sync 1062 207 
gnome-screenshot -f /tmp/copycolor.png
eval $(xdotool getmouselocation --shell)
IMAGE=`convert /tmp/copycolor.png -depth 8 -crop 1x1+$X+$Y txt:-`
COLOR=`echo $IMAGE | grep -om1 '#\w\+'`
echo -n $COLOR | xclip -i -selection CLIPBOARD
#notify-send "Color under mouse cursor: " $COLOR
#echo "Color under mouse cursor: " $COLOR
echo $COLOR > ./Color4.txt
cat  ./Color4.txt

#if [ `cat ./Color4.txt` == `cat ./Color1.txt` ]; then
#    xdotool mousemove --sync 1062 207 click 1
#fi
#
#if [ `cat ./Color4.txt` == `cat ./Color2.txt` ]; then
#    xdotool mousemove --sync 1062 207 click 1
#fi

#if [ `cat ./Color4.txt` == `cat ./Color3.txt` ]; then
#    xdotool mousemove --sync 1062 207 click 1
#fi
