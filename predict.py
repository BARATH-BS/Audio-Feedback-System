#!C:/Users/HP/anaconda3/python.exe
print("Content-Type:text/html")
print()

print('''<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Predict</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
      body
      {
        background-color: #a8e4ff;
      }
      a
      {
      text-decoration: none;
      color: black;
      }
      </style>
  </head>
  <body>''')

print(''' <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark sticky-top">
<a class="navbar-brand" href="home.php">AFS</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="record.php">Upload<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view.php">View Recordings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
</ul>
</div>
</nav>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="home.php">Home</a></li>
<li class="breadcrumb-item"><a href="record.php">Record</a></li>
<li class="breadcrumb-item active" aria-current="recordupload.php">Record Upload</li>
</ol>
</nav>''')

import cgi
import mysql.connector

form=cgi.FieldStorage()
user=form.getvalue("userid")
date=form.getvalue("date")
#print(user)
#print(" your next class overall experience would")

overall=0
technology=0
environment=0
knowledge=0
mode=0
user='admin'
date='2020:10:28'
con=mysql.connector.connect(user='root',password='',host='localhost',database='audiofeedbacksystem')
cur=con.cursor()
sql = "SELECT * FROM dataset where userid=%s and sdate=%s"
condition = (user,date,)
cur.execute(sql, condition)
res=cur.fetchall()
for row in res:
    overall=int(row[3])
    technology=int(row[4])
    environment=int(row[5])
    knowledge=int(row[6])
    mode=int(row[7])
cur.close()
con.close()
print('''<div class="input-group-prepend">
<span class="input-group-text">User ID</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(user)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Date</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(date)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Overall</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(overall)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Technology</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(technology)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Environment</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(environment)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Knowledge</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(knowledge)
print('''</div>''')
print('''<div class="input-group-prepend">
<span class="input-group-text">Mode</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(mode)
print("<br>")
print("1=>Online and 0=>Offline")
print('''</div>''')

#import machine as m
#m.UploadDataBase(user,date,overall,technology,environment,knowledge,mode)
con=mysql.connector.connect(user='root',password='',host='localhost',database='audiofeedbacksystem')
cur=con.cursor()
sql = "SELECT predict FROM dataset where userid=%s and sdate=%s"
condition = (user,date, )
cur.execute(sql, condition)
res=cur.fetchall()
predictoverall=0
for row in res:
    predictoverall=row[0]
print('''<div class="input-group-prepend">
<span class="input-group-text">Predicted Overall Experience</span>
</div>''')
print('''<div class="shadow-lg p-3 mb-5 bg-white rounded">''')
print(predictoverall)
print(" out of 10")
print('''</div>''')
cur.close()
con.close()
print("<br>")
print('''<center>
<button type="button" class="btn btn-success btn-lg btn-block"><a href="home.php">Home</a></button><br><br>
</center>''')
print('''</body>
</html>''')
