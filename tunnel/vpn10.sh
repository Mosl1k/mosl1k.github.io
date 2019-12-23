#!/bin/bash
stuns="stun.sipnet.ru stun.ekiga.net"   		# Список STUN серверов через пробел
username=" Login "		# Логин от Яндекс.диска
password=" Password "   	# Пароль от Яндекс.диска
intip="10.23.22.1"		# IP-адрес внутреннего интерфейса

WARN='\033[37;1;41m'
END='\033[0m'
RED='\033[0;31m'
GREEN='\033[0;32m'
al="ip echo readlink dirname grep awk md5sum openssl sha256sum shuf curl sleep openvpn cat stun"
ch=0
for i in $al; do which $i > /dev/null || echo -e "${WARN}Для работы необходим $i ${END}"; which $i > /dev/null || ch=1; done
if (( $ch > 0 )); then echo -e "${WARN}Ой, отсутствуют необходимые для корректной работы приложения${END}"; exit; fi
if [[ $1 == '' ]];
    then
	echo -e "${WARN}Введите идентификатор соединения (любое уникальное слово, должно быть одинаковое с двух сторон!) ${END} \t
	${GREEN}Для запуска в автоматическом режиме при включении компьютера можно прописать в /etc/rc.local строку nohup /<путь к файлу>/vpn10.sh  > /var/log/vpn10.log 2>/dev/hull & ${END}"
	exit
fi
ABSOLUTE_FILENAME=`readlink -f "$0"`                                                    # полный путь до скрипта
DIR=`dirname "$ABSOLUTE_FILENAME"`                                                      # каталог в котором лежит скрипт
key="$DIR/secret.key"
until [[ -n "$iftosrv" ]]
    do
	echo "$(date) Определяю сетевой интерфейс"; iftosrv=`ip route get 8.8.8.8 | head -n 1 | sed 's|.*dev ||' | awk '{print $1}'`
	sleep 5
done
timedatectl
name=$(uname -n | md5sum | awk '{print $1}')
vpn=$(echo $1 | md5sum | awk '{print $1}')
echo "$(date) Создаю папку на Яндекс.диске"
curl -X MKCOL --user "${username}:${password}" https://webdav.yandex.ru/vpn-$vpn
echo "$(date) ID на диске: $vpn"
until [ $c ];do
    echo "$(date) Очищаю папку от всякого мусора"
    for i in `curl --silent --user "$username:$password" -X PROPFIND -H "Depth: 1" https://webdav.yandex.ru/vpn-$vpn/ | sed 's/></\n/g' | grep "d:displayname" | sed 's/d:displayname//g' | sed 's/>//g' | sed 's/<//' | sed 's/\///g' | grep -v $(date +%Y-%m-%d-%H-%M)`
               do
               echo -e "$(date)${RED} Удаляю старый файл: $i${END}"
               curl -X DELETE --user "${username}:${password}" https://webdav.yandex.ru/vpn-$vpn/$i
               done
    echo "$(date) ID на диске: $vpn"
        openvpn --genkey --secret "$key"
        passwd=`echo "$vpn-tt" | sha256sum | awk '{print $1}'`
        openssl AES-256-CBC -e -in "$key" -out "$DIR/file.enc" -k "$passwd" -base64
        curl -T "$DIR/file.enc" --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/key.enc
        rm "$DIR"/file.enc
    echo -e "$(date) ${GREEN}Фаза 1 - Получение готовности удаленного узла${END}"
    go=3
    localport=`shuf -i 20000-65000 -n 1`    # генерация локального порта
    start=''
    remote=''
    timeout1=''
    nextcheck=''
    timestart=''
    until [[ $b ]]
	do
	echo "$(date) Проверяю папку"
	date=`date +%s`
	timeout1=60
	echo "$(date) Создание файла готовности $date"
	echo "$date" > "/tmp/ready-$date-$name.txt"
	curl -T "/tmp/ready-$date-$name.txt" --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/ready-$name.txt
	readyfile=`curl --silent --user "${username}:${password}" -X PROPFIND -H "Depth: 1" https://webdav.yandex.ru/vpn-$vpn/ | sed 's/></>\n</g' | grep -v $name | grep "ready" | grep "d:displayname" | sed 's/<d:displayname>//g' | sed 's/<\/d:displayname>//g'`
	if [[ -z $readyfile ]]
	    then
		echo -e "$(date) ${RED} Удаленный узел не готов ${END}"
		echo "$(date) Жду 60 секунд"
		sleep $timeout1
	    else
		remote=$(curl --silent --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/$readyfile)
		echo -e "$(date) ${GREEN} Удаленный узел готов ${END}"
		start=`curl --silent --user "${username}:${password}" -X PROPFIND -H "Depth: 1" https://webdav.yandex.ru/vpn-$vpn/ | sed 's/></>\n</g' | grep "start" | grep "d:displayname" | sed 's/-/ /g' | awk '{print $2}'`
		if [[ -z $start ]]
		    then
                                                let nextcheck=$timeout1-$date+$remote
			let timestart=$date+$timeout1-$nextcheck
			go=$nextcheck
			echo "$timestart" > "/tmp/start-$date-$name.txt"
			curl -T "/tmp/start-$date-$name.txt" --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/start-$date-$name.txt
		    else
			echo "$(date) жду $go секунд"
			sleep $go
			b=1
			a=''

		    fi

	    fi
    done
echo -e "$(date) ${GREEN}Фаза 2 - Обмен данными и установка соединения${END}"
mydata=''
filename=''
address=''
myip=''
ip=''
port=''
ex=0
    until [ $a ]; do
                until [[ -n "$mydata" ]]; do
		k=`echo "$stuns" | wc -w`
		x=1
		z=`shuf -i 1-$k -n 1`
		for st in $stuns; do
		    if [[ $x == $z ]]; then
			stun=$st;
		    fi;
		    (( x++ ));
		done
                                echo "$(date) Подключение и получение данных от STUN сервера: $stun"
		sleep 5 && for pid in $(ps xa | grep "stun "$stun" 1 -p "$localport" -v" | grep -v grep | awk '{print $1}'); do kill $pid; done &
                                mydata=`stun "$stun" 1 -p "$localport" -v 2>&1 | grep "MappedAddress" | sort | uniq`
                done
	    echo -e "$(date) ${GREEN}Мои данные соединения: $mydata${END}"
                    echo "$(date) Загрузка данных на Яндекс.диск"
	    echo "$mydata" > "$DIR/mydata"
	    echo "IntIP $intip" >> "$DIR/mydata"
	    curl -T "$DIR/mydata" --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/$name-ipport.txt
	    rm "$DIR/mydata"
	    sleep 5
	    echo "$(date) Получение файла данных удаленного узла"
	    filename=$(curl --silent --user "${username}:${password}" -X PROPFIND -H "Depth: 1" https://webdav.yandex.ru/vpn-$vpn/ | sed 's/></\n/g' | grep "d:displayname>" | grep "ipport" | grep -v "$name" |  sed 's|.*d:displayname>||' | sed 's/</ /g' | awk '{print $1}')
	    if [[ -n "$filename" ]]
		then
		    echo "$(date) Чтение файла данных удаленного узла: $filename"
		    address=$(curl --silent --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/$filename | grep "MappedAddress" | head -n1 | sed 's/:/ /g')
		    intip2=$(curl --silent --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/$filename | grep "IntIP" | head -n1 | awk '{print $2}')
		    echo "$(date) Определение IP-адреса и порта: $address $sesid2 $tunid2"
		    ip=$(echo "$address" | awk '{print $3}')
		    port=$(echo "$address" | awk '{print $4}')
		    myip=`ip route get "$ip" | head -n 1 | sed 's|.*src ||' | awk '{print $1}'`
		    if [[ -n "$ip" && -n "$port" && -n "$myip" && -n "$localport" ]];
			then
			    echo -e "$(date) ${GREEN} Соединение $ip $port ${END}"
			    echo -e  "`date` ${GREEN} $myip:$localport -> $ip:$port ${END}"
                	    	    curl --silent --user "$username:$password" https://webdav.yandex.ru/vpn-$vpn/key.enc > "$DIR/secret.enc"
                        		openssl AES-256-CBC -d -in "$DIR/secret.enc" -out "$key" -k "$passwd" -base64
                        		chmod 600 "$key"
                        		rm "$DIR/secret.enc"
                        		openvpn --remote $ip --rport $port --lport $localport \
                        		--proto udp --dev tun --float --auth-nocache --verb 3 --mute 20 \
                        		--ifconfig "$intip" "$intip2" \
                        		--secret "$key" \
                        		--auth SHA256 --cipher AES-256-CBC \
                        		--ncp-disable --ping 10 --ping-exit 20 \
                        		--comp-lzo yes
			    a=1
			    b=''
                                         fi
			else
			    if (( $ex >= 5 ))
				then
				    echo "$(date) Сброс"
				    a=1
				    b=''
			    fi
			    (( ex++ ))
		    sleep 5
	    fi
	done
done
