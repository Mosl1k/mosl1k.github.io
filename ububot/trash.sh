#!/bin/bash
commands=(
    "sleep 1"
    "mousemove 210 105"
    "click 1"
    "mousemove 210 160"
    "sleep 0.1"
    "click 1"
    "sleep 0.1"
    "key Return"
    "sleep 0.1"
    "key Return"
    "sleep 0.1"
    "key ctrl+v"
    "sleep 0.5"
    "key Return"
    "sleep 10"
    "key Return"
    "sleep 0.5"
    "key Escape"
 
)
while read COL
do
    echo -n $COL | xclip -selection c
    xdotool ${commands[*]}
    echo 
done < $1
#xdotool mousemove 1835 50 click 1

commands=(
    "sleep 1"
    "mousemove 210 105"
    "click 1"
 
)
while read COL
do
    echo -n $COL | xclip -selection c
    xdotool ${commands[*]}
    echo 
done < $1
#

X=1000
Y=600
COL=`cat ./colour`

if COL = colour;then 
xdotool mousemove $X $Y click 1 click 1
else
(($X++))
(($Y++))
grabc 1>colour 2>>/dev/null &
xdotool click 1
fi


пашет
for x in {1760..1895..45}; do
  for y in {760..985..45}; do
    xdotool mousemove --sync $x $y click 3 sleep 0.1 \
    mousemove_relative --sync 0 20 click 1 sleep 0.1
  done
done


не пашет

for x in $(seq 1760 45 1895)
do
    for y in $(seq 760 45 985)
    do
        xdotool mousemove x y click 3
        sleep 0.1
        xdotool mousemove x y+20 click 1
        sleep 0.1
    done
done


X=0
Y=0
while [ 1 ]
do
((X++))
((Y++))
grabc 1>colour 2>>/dev/null &
xdotool mousemove --sync $X $Y click 1 sleep 0.1 
cat colour
done
