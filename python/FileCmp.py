#!/usr/bin/python
#-*- coding: UTF-8 -*-
from filecmp import dircmp
#import difflib
import subprocess
import sys
import re
import os
import argparse
#from shutil import rmtree




####
#### from Baltyisk of 17.10.2019
#### 
#### don't mount remote dir
#### 
####
####
####

mountPoint, localIP = '', ''

#
#НАДО
#добавить
#свойства файлов
#опции - с одинаковыми файлами или без, замена файлов,
#
#проблемы
#определение версии python-а и, в зависимости от этого, обёртки для функций
#
#сравнение каталогов
def  comp_files(dc, f):
    print(dc.left, " ",dc.right)
    dcLeftPath, dcRightPath = "", ""
    for name in dc.diff_files:
        #если сменили текущий каталог в одной из директорий добавить запись об этом в лог
        if dcLeftPath != dc.left or dcRightPath != dc.right:
            f.write("\n\n")
            f.writelines("Files differs in "+dc.left+" and  "+dc.right+"\n")
#            f.writelines(dc.right+"\n")
        #записать имя отличающегося файла в лог
        f.writelines(name + "\n")
        #запоминаем текущий путь для дальнейшего выявления смены каталога
        dcLeftPath = dc.left
        dcRightPath = dc.right

    for sub_dir in dc.subdirs.values():
        comp_files(sub_dir, f)

def scanFilesInLeft(dc, f):
    dcLeftPath = ""
    for name in dc.left_only:
        #если сменили текущий каталог в одной из директорий добавить запись об этом в лог
        if name != []:
    	    if dcLeftPath != dc.left:
		f.write("\n\n")
		f.write("Files exist only in "+dc.left+"\n")
		dcLeftPath = dc.left
            f.writelines(name+"\n")

        #записать имя отличающегося файла в лог
        #запоминаем текущий путь для дальнейшего выявления смены каталога
    for sub_dir in dc.subdirs.values():
        scanFilesInLeft(sub_dir, f)
    

def scanFilesInRight(dc, f):
    dcRightPath = ""
    for name in dc.right_only:
        #если сменили текущий каталог в одной из директорий добавить запись об этом в лог
        if name != []:
            if dcRightPath != dc.right:
            	f.write("\n\n")
		f.write("Files exist only in "+dc.right+"\n")
		dcRightPath = dc.right
            f.writelines(name+"\n")
        #записать имя отличающегося файла в лог
        #запоминаем текущий путь для дальнейшего выявления смены каталога
    for sub_dir in dc.subdirs.values():
        scanFilesInRight(sub_dir, f)


#Выполнение команд по ssh
def doSSH(remoteAddress, command):

    #try:

    ssh = subprocess.Popen(['ssh', 'root@'+remoteAddress, command], shell=False, stdout=subprocess.PIPE,
                           stderr=subprocess.PIPE)

    #except:

    #смена кодировки ответного сообщения от ОС МСВС иначе ничего не разобрать,
    #wrapper = io.TextIOWrapper(ssh.stdout, encoding='koi8-r', line_buffering=True)
    #result = wrapper.readlines()
    result = ssh.stdout.readlines()
    if result == []:
        #wrapper = io.TextIOWrapper(ssh.stderr, encoding='koi8-r', line_buffering=True)
        #error = wrapper.readlines()
        error = ssh.stderr.readlines()
        print('ERROR!!!: ' + str(error))
        sys.exit(1)
    else:
        return result


#проверка IP на корректность -- проблема с возвратом от re.match в pycharm, на 3-ем питоне, работет нормально, в консоли на 2.7, возвращает байты в 16-еричной системе
def isIpCorrect(ip):
    m = re.match(r'(([0-9]){1,3}\.([0-9]){1,3}\.([0-9]){1,3}\.([0-9]){1,3})', ip)
    return m

#принять решение
def makeDecision(question):
    print(question)
    answer = my_input("Yes(Y) or No(N)?\n")
    if (re.match(r'N|n', answer)):
        answer = False
    else:
        answer = True
        #sys.exit(1)
    return answer

#проверяет смонтирван ли каталог и создаёт если требуется, и монтирует

#надо тестировать
def isMount(mPoint, remoteIP, path):
    global mountPoint
    mountPoint = mPoint
    while True:
        #print(mPoint)
        #путь заполнен
        if mountPoint:
            #но не существует
            if  not os.path.exists(mountPoint):
                #создать
                #answer == my_input('Mount point \"'+mPoint+'\" not exist. Do you want make this mount point?')
                if (makeDecision("Mount point \""+mountPoint+"\""" not exist. Do you want make this mount point?\n")):
                    try:
                        os.makedirs(mountPoint)
                    except OSError:# as e:
                        #print(e.strerror)
                        #print(e.errno)
                        print(OSError.strerror)
                        print(OSError.errno)
                        mountPoint = ""
                else:
                    if (makeDecision('Can\'t continue my work, you mast enter mount point for mounting remote analised directory. Exit?\n')):
                        sys.exit(1)
                    else:
                        mountPoint = ""

            # уже смонтирован
            elif(os.path.ismount(mountPoint)):
                if (makeDecision("Mount point " + mountPoint + " is busy. Do you want enter enother mount point?\n")):
                    mountPoint = my_input("Enter mount point:\n")
                else:
                    break
            else:
                try:
                    cmd = subprocess.call(['mount', '-t', 'nfs', remoteIP + ':' + path, mountPoint])
                    print("mounting done.\n")
                    break
                except OSError:# as e:
                    #print(e.errno)
                    #print(e.strerror)
                    print(OSError.strerror)
                    print(OSError.errno)

        else:
            mountPoint = my_input("Enter mount point:\n")

    return mountPoint
    #rmtree(mountPoint) #надо отмонтировать по запросу и удалять точки монтирования по запросу

def isMountIfLocalPath(path):
    while True:
        #print(mPoint)
        #путь заполнен
        if path:
            #но не существует
            if (not os.path.exists(path)):
                #создать
                #answer == my_input('Mount point \"'+mPoint+'\" not exist. Do you want make this mount point?')
                if (makeDecision("Path \""+path+"\""" not exist. Do you want make this path?\n")):
                    try:
                        os.makedirs(path)
                    except OSError:# as e:
                        #print(e.strerror)
                        #print(e.errno)
                        print(OSError.strerror)
                        print(OSError.errno)
                        path = ""
                else:
                    if (makeDecision('Can\'t continue my work, you mast enter analysed directory. Exit?\n')):
                        sys.exit(1)
                    else:
                        mountPoint = ""

            # уже смонтирован
            elif (os.path.ismount(path)):
                if (makeDecision("Path "+path+" is mount point for .......... Do you want enter enother mount point?\n")):
                    mountPoint = my_input("Enter mount point:\n")
                else:
                    print('Use for one of analysed dir path: '+path+'\n')
                    mountPoint = path
                    break

            # предполагаю что существует и ничего не смонтировано
            else:
                mountPoint = path
                break

        else:
            mountPoint = my_input("Enter mount point:\n")

    return mountPoint
    #rmtree(mountPoint) #надо отмонтировать по запросу и удалять точки монтирования по запросу


#обёртка для разных версий python-а
def my_input(put):
    if (sys.version_info[0] < 3):
        put = raw_input(put)
    else:
        import io
        put = input(put)
    return put

#разбирает путь, определяет локальный или удалённый, в случае надобности производит необходимые действия применяя соответсвующие функции, возвращает путь к проверяемому каталогу
#path - путь к каталогу с файлами (может содержать IP адресс); mPoint - точка монтирования( локальная, если путь к каталогу с файлами содержит IP адресс и,
# соответсвенно, требуется смонтиорвать удалённый каталог; lIP - локальный IP адресс( если требуется)


#надо тестировать
def parseArgvAndReturnPath(path, mPoint, lIP):
    global localIP
    m = isIpCorrect(path)
    #если есть корректный айпи адрес
    if m:
        path = path.split(':')
        remoteIP = path[0]
        path = path[1]
        m = isIpCorrect(lIP)
        #если переменная lIP пустая или некорректная
        if (not m) or (not (m.end() == len(lIP))):
            while True:
                localIP = my_input("Enter local IP: \n")
                m = isIpCorrect(localIP)
                # некорректно ввели localIP
                if (not m) or (not (m.end() == len(localIP))):
                    print("Local IP address not correct\n")
                    #sys.exit(1)
                    localIP = my_input("Enter local IP: \n")
                else:
                    break
        else:
            localIP = lIP

        #если точка монтирования не вводилась
        if (re.match(r'',mPoint)):
            mountPoint= my_input('Enter mount point\n')
            #mountPoint = my_input('Mount point \"'+mPoint+'\" is already in use.'"\n Enter another mount point\n")
        else:
            mountPoint = mPoint

        #проверяет есть ли exportfs
        result = doSSH(remoteIP, 'whereis exportfs')
        if not re.findall(r'(..bin/exportfs)', str(result)):
            print("Can't find exportfs form nfs-kernel package in remote machine (IP is: "+remoteIP+")\n")
            sys.exit(1)

        #проверяет состояние nfs и запускает его по необходимости
        result = doSSH(remoteIP, 'service nfs status')
        #если сервис не остановлен и не запущен - другими словами ответ не понятен
        if not re.findall(r'(остановлен)', str(result)) and not re.findall(r'(is running)', str(result)):
            if (makeDecision('Can\'t recognize answer from remote machine. Start nfs on '+remoteIP+' ?\n')):
                result = doSSH(remoteIP, 'service nfs start')
            else:
                print('Try mount remote path from \"'+remoteIP+':'+path+'\" without running nfs service.\n')
        #если остановлен - запустить
        elif re.findall(r'(остановлен)', str(result)):
            result = doSSH(remoteIP, 'service nfs start')

        #предоставляет доступ к каталогу на удалённой машине для монтирования
        # nfs
        doSSH(remoteIP, '/usr/sbin/exportfs ' + localIP + ':' + path + ' -v')

        #монтирует и по необходимости создаёт точку монтирования
        path = isMount(mountPoint, remoteIP, path)
#            cmd = subprocess.call(['mount', '-t', 'nfs', remoteIP + ':' + path, mountPoint])
#            if cmd != 0:
                #32 =  broken pipe
                #nfs1 is busy or already mounted
                #mount point ./nfs does not exist
#                if (os.path.ismount(mountPoint)):
#                    mountPoint = my_input("Mount point "+mountPoint+" is busy. Enter enother mount point:")
#                elif not (os.path.exists(mountPoint)):

#                answer = my_input("Skeep this error and continue(Y) or exit(N)?\n")#ничего не делает в случае любой ошибки и работает дальше - т.е. не монтирует
#            if (re.match(r'N|n', answer)):
#                sys.exit(1)

#        path = mountPoint
    else:
        path = isMountIfLocalPath(path)

    return path

#разбор параметров
def parseParams():
    '''
    if len (sys.argv) != 3:
        argv = "count options less then two"
    else:
        argv = sys.argv
     '''
    parser = argparse.ArgumentParser(description='Compare script. Compare files in dirs and write differs in log file',
                                     epilog="JIexa Brykin not responsible for this shitty")

#    parser.add_argument('--ssh', nargs=1, help="compare via ssh connection", metavar="IP_ADDRESS")

    parser.add_argument('-e', '--ethalon_dir', required=True,
                        help="Example: /tmp/test1/",
                        metavar="PATH_TO_ETHALON_FILES")

    parser.add_argument('-a', '--analysed_dir', required=True,
                        help="Example: /tmp/test2/",
                        metavar="PATH_TO_ANALYSED_FILES")

    return parser


parser = parseParams()
params = parser.parse_args(sys.argv[1:])
#print(params.ethalon_dir)
#print(params.analysed_dir)
#####ethalonDir = my_input("Enter ethalon directory: (Example: 192.168.1.1:/tmp/test - ower ssh; /tmp/test - local path\n\n")
#####ethalonDir = parseArgvAndReturnPath(ethalonDir, mountPoint, localIP)
ethalonDir = parseArgvAndReturnPath(params.ethalon_dir, mountPoint, localIP)

#####analysedDir = my_input("Enter analysed directory: (Example: 192.168.1.1:/tmp/test - ower ssh; /tmp/test - local path\n\n")
#####analysedDir = parseArgvAndReturnPath(analysedDir, mountPoint, localIP)
analysedDir = parseArgvAndReturnPath(params.analysed_dir, mountPoint, localIP)

outputPathAndFileName = my_input("Enter path and name of log file: \n(Example: /tmp/test/differFiles.log)\n\n")



dc = dircmp(ethalonDir, analysedDir)
f = open(outputPathAndFileName, 'w')


#форматировать ввывод
comp_files(dc, f)
scanFilesInRight(dc, f)
scanFilesInLeft(dc, f)

#запрос на отмонтирование, удаление, каталогов, если был задействован nfs с создовались точки монтирования

