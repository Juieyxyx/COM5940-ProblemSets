from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
import requests

app = Flask(__name__)

@app.route('/')

def index():
    r = requests.get('https://api.airtable.com/v0/apphfQW4UvVKdyRon/douban?api_key=keyIvnCG4lnYkaCAs')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)
    return render_template('index.html', entries=dataset, title='豆瓣小组话题精选 ')
