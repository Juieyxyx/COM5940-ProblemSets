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



@app.route("/chart")
def chart():
    r = requests.get('https://api.airtable.com/v0/app2jDjVHPNoAHwhY/user?api_key=keyIvnCG4lnYkaCAs&sortField=_createdTime&sortDirection=desc')
    dict1 = r.json()
    dict2 = {}
    dataset = []
    user_list = []
    point_list = []
    for i in dict1['records']:
         dict2 = i['fields']
         dataset.append(dict2)
    for item in dataset:
        user_list.append(item.get('user'))
        point_list.append(item.get('point'))
    return render_template('chart.html', entries = zip(user_list, point_list))




if __name__ == '__main__':
   app.run(debug = True)
