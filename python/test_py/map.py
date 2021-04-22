#! /usr/bin/env python
###### -*- coding: utf-8 -*-

v = raw_input('Введите числа через запятую: ') #.split(',')
print(v)
ints = map(int, v)
print(ints)
for i in ints:
    print(i)
lst = list(ints)
tup = tuple(lst)
print('spis:', lst)
print('cort:', tup)

#L1 = [int(i) for i in raw_input().split(',')]