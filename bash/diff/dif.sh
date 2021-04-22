#!/bin/bash

ls -l ./test1 > ./tmp1
ls -l ./test2 > ./tmp2

diff ./tmp1 ./tmp2 > out1
cat out1 |awk {'print $10'} |sort -u > ./out2

for i in `cat ./out2`
do
cp ./test2/$i ./tmp
done
diff -r ./test1 ./tmp |grep -v "Только"
#cat ./tmp1 >> ./tmp3
#cat ./tmp2 >> ./tmp3
#sort -u ./tmp3