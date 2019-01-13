import pymysql    # pip install PyMySQL
import os
import base64

dirPath = "path of directory having 25 folders from root"
# Get the connect details from db.php
db = pymysql.connect(host='10.0.0.140',user='root',passwd='see in db.php', db = "gkart")
cursor = db.cursor()

query = "UPDATE {} SET image = {} WHERE id = {};"
red_dot = "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg=="
ready_query = query.format("1", red_dot, "2")
print(ready_query)

# for folder in os.listdir(dirPath):
#     folderPath = dirPath + "/" + folder
#     for loc, file in enumerate(os.listdir(folderPath)):
#         with open(folderPath + "/" + file, "rb") as image_file:
#             encoded_string = base64.b64encode(image_file.read())
#             ready_query = query.format(folder, encoded_string, str(loc+1))  # If auto id starts from 1
#             cursor.execute(ready_query)


