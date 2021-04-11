#!"C:\python\python.exe"
# -*- coding: utf-8 -*
import cgi
import sys
import codecs
import html
import psycopg2
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
form = cgi.FieldStorage()
text1 = form.getfirst("TEXT_1", "не задано")
text1 = html.escape(text1)
conn = psycopg2.connect(
    dbname = 'postgres',
    user = 'postgres',
    password = '1',
    host = '87.76.10.191',
    port = '5432') 
cursor = conn.cursor()
cursor.execute('SELECT {} FROM test;'.format(text1))
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
print("<h1>получил?</h1>")
print("<p>по таким столбцам: {}</p>".format(text1))
for row in records:
    print("<p>{}</p>".format(row))
print("<p><a href='http://kpalch.ddns.net:80'>Домой</a></p>")
print("""</body>
        </html>""")

