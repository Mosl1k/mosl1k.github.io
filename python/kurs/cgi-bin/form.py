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
text2 = form.getfirst("TEXT_2", "не задано")
#text3 = form.getfirst("TEXT_3", "не задано")
text1 = html.escape(text1)
text2 = html.escape(text2)
#text3 = html.escape(text2)

print("Content-type: text/html\n")
print("""<!DOCTYPE HTML>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Обработка данных форм</title>
        </head>
        <body>""")

print("<h1>Обработка данных форм!</h1>")
print("<p>TEXT_1: {}</p>".format(text1))
print("<p>TEXT_2: {}</p>".format(text2))
#print("<p>TEXT_3: {}</p>".format(text2))

print("""</body>
        </html>""")
