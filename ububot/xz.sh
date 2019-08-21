eval $(xdotool getmouselocation --shell)
IMAGE=`xwd -root -silent | convert xwd:- -depth 8 -crop 1x1+$X+$Y txt:-`
COLOR=`echo $IMAGE | grep -om1 '#\w\+'`
COLOR1=`echo ${COLOR:1:6}`
