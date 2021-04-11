#!"C:\python\python.exe"
# -*- coding: utf-8 -*
import cgi
import sys
import codecs
import html
import psycopg2
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
form = cgi.FieldStorage()
test = form.getfirst("TEXT_2", "не задано")
test = html.escape(test)
fio = form.getfirst("TEXT_3", "не задано")
fio = html.escape(fio)
conn = psycopg2.connect(
    dbname = 'postgres',
    user = 'postgres',
    password = '1',
    host = '87.76.10.191',
    port = '5432') 
cursor = conn.cursor()
cursor.execute('SELECT coalesce(max(id), 0 ) FROM test;')
nums = cursor.fetchone()[0]
#with open ("logf.txt", "w") as f:
 #   f.write(str(nums))
num = (int(nums) + 1)
sql = "INSERT INTO test VALUES (%s, %s, %s);"
val = (num,'{}'.format(test), '{}'.format(fio))
cursor.execute(sql, val)
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
print("<h1>Ебучие данные</h1>")
print("<p>{} захуярились</p>".format(test + ' ' + fio))
print("<p><a href='http://kpalch.ddns.net:80'>Домой</a></p>")
for row in records:
    print("<p>{}</p>".format(row))
print("""</body>
        </html>""")
