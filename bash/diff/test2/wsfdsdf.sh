#!/bin/bash
CHOISE=`gdialog --menu "Выбор конфигурации сети:" a "vtund" b "default"`
 
# если нажата кнопка OK
if [ $? == 0 ]
then
    case $CHOISE in
    a) ./vtund.run
    ;;
    b) ./network_default.sh
    ;;
    esac
fi