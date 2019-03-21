#!/usr/bin/env python
# -*- coding: utf-8 -*-

import datetime
from bs4 import BeautifulSoup

# BeautifulSoup, HTML/XML parser for python

print("Running benchmark for BeautifulSoup...")

with open('./html/index.html') as f:
    html = f.read()
    
    # HTML Element Search
    soup = BeautifulSoup(html, 'html.parser')
    startTime = datetime.datetime.now()

    for i in range(10000):
        # search single element
        soup.select_one('#posts')

        # search multiple element
        soup.select('.post')

        # select child element
        soup.select('#posts .post')

    timeResult = datetime.datetime.now() - startTime
    print(timeResult)

    # HTML Element Modification
    startTime = datetime.datetime.now()
    for i in range(10000):
        soup = BeautifulSoup(html, 'html.parser')

        # modify element
        soup.select_one('.post').replace_with('modified')

        # remove element
        soup.select_one('.post').decompose()

    timeResult = datetime.datetime.now() - startTime
    print(timeResult)
