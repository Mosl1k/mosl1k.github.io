from os import listdir
from os.path import isfile, join
files = [f for f in listdir('/home/moslik') if isfile(join('/home/moslik', f))]
print(files)