#!"C:\python\python.exe"
# -*- coding: utf-8 -*
import cgi
import sys
import codecs
import html
import psycopg2
import os
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
conn = psycopg2.connect(
    dbname = 'postgres',
    user = 'postgres',
    password = '1',
    host = '87.76.10.191',
    port = '5432') 
cursor = conn.cursor()
cursor.execute('truncate table test;')
conn.commit()
cursor.execute('SELECT * FROM test;')
records = cursor.fetchall()
cursor.close()
conn.close()
print("Content-type: text/html\n")
print("""<!DOCTYPE HTML>
        <html>
        <head>
            <meta charset="utf-8">
            <title>сраная база</title>
        </head>
        <body>""")
print("<h1>Пиздец таблице</h1>")
print("<p><a href='http://kpalch.ddns.net:80'>Домой</a></p>")
for row in records:
    print("<p>{}</p>".format(row))
    
print("""</body>
        </html>""")
