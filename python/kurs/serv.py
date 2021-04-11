###
###!"C:\python\python.exe"
# -*- coding: utf-8 -*
#comm= 'psql \! chcp 1251'
import os
##os.chdir(r"D:\\kurs\\")
from http.server import HTTPServer, CGIHTTPRequestHandler
server_address = ("", 80)
httpd = HTTPServer(server_address, CGIHTTPRequestHandler)
httpd.serve_forever()
