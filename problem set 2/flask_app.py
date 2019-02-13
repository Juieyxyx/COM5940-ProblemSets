from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False

@app.route("/")
def home():
    return render_template('index.html')

if __name__ == '__main__':
   app.run(debug = True)
