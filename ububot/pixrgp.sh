xwd -root -silent | convert xwd:- -depth 8 -crop "1x1+$X+$Y" txt:- | grep -om1 '#\w\+' 
