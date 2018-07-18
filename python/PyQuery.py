#!/usr/bin/python
# -*- coding: UTF-8 -*-

from pyquery import PyQuery as pq

from email import encoders
from email.header import Header
from email.mime.text import MIMEText
from email.utils import parseaddr, formataddr
import smtplib


doc = pq('http://www.ynsdfz.org/info/123.html')
print(doc('#right .list').eq(0).find('a').attr('href'))
print((doc('#right .list').eq(0).find('a').attr('href')) == 'http://www.ynsdfz.org/info/123/3340.html')