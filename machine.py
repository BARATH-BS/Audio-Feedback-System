import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import mysql.connector
def UploadDataBase(user,date,overall,technology,environment,knowledge,mode):
    data = pd.read_csv('dataset.txt')
    data['Date'] = pd.to_datetime(data['Date'])
    data = data.set_index('Date')
    data.head()
    testitout = pd.DataFrame([[overall,technology,environment,knowledge,mode]])   #Insert HERE the DATA

    x = data.iloc[:,1:]
    y = data.iloc[:,0]
    from sklearn.model_selection import train_test_split
    x_train,x_test,y_train,y_test = train_test_split(x,y,train_size = 0.8)

    from sklearn.ensemble import RandomForestRegressor
    rand = RandomForestRegressor(max_depth=30)
    d = rand.fit(x_train,y_train)

    pred = d.predict(testitout)
    #print(pred)
    pred=pred[0]
    pred=str(pred)
    #print(pred)

    conn=mysql.connector.connect(user='root',password='',host='localhost',database='audiofeedbacksystem')
    cur=conn.cursor()
    sql = "UPDATE dataset SET predict=%s  where userid=%s and sdate=%s"
    condition = (pred,user,date,)
    cur.execute(sql, condition)
    conn.commit()
    cur.close()
    conn.close()
