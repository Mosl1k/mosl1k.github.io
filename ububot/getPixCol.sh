#>pixel
#>color
#grabc 1>color 2>>/dev/null &
xdotool getmouselocation --shell 1>pixel 2>>/dev/null 
#cat ./color
cat ./pixel