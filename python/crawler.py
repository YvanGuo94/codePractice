#!/usr/bin/python
# -*- coding: UTF-8 -*-

from pyquery import PyQuery as pq

from email import encoders
from email.header import Header
from email.mime.text import MIMEText
from email.utils import parseaddr, formataddr
import smtplib


doc = pq('http://www.ynsdfz.org/info/123.html')
if doc('#right .list').eq(0).find('a').attr('href') != 'http://www.ynsdfz.org/info/123/3340.html':
    # 输入Email地址和口令:
    from_addr = ''
    password = ''
    # 输入SMTP服务器地址:
    smtp_server = ''
    # 输入收件人地址:
    to_addr = ''

    def _format_addr(s):
        name, addr = parseaddr(s)
        return formataddr(( \
            Header(name, 'utf-8').encode(), \
            addr.encode('utf-8') if isinstance(addr, unicode) else addr))

    msg = MIMEText('hello, send by Python...', 'plain', 'utf-8')
    msg['From'] = _format_addr(u'Python爱好者 <%s>' % from_addr)
    msg['To'] = _format_addr(u'管理员 <%s>' % to_addr)
    msg['Subject'] = Header(u'来自SMTP的问候……', 'utf-8').encode()

    server = smtplib.SMTP(smtp_server, 587) # SMTP协议默认端口是25
    server.starttls()
    #server.set_debuglevel(1)
    server.login(from_addr, password)
    server.sendmail(from_addr, to_addr, msg.as_string())
    server.quit()

#print(doc('#right .list').eq(0).find('a').attr('href'))