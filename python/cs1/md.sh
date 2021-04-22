#!/bin/bash

for i in `ls .`;
do
md5sum $i;
done
