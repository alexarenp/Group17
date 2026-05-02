# CS312Group17

db.php

# Backup files
*.bak
*.swp
*.swo

# OS files
.DS_Store
Thumbs.db

# Log files
*.log
 33 changes: 33 additions & 0 deletions33  
README.md
Original file line number	Original file line	Diff line number	Diff line change
@@ -1 +1,34 @@
# CS312Group17	# CS312Group17

## Database access

### Acces your Database 

mysql -u USER_ID -D USER_ID -h helmi -p

 Enter Password: YOUR_CSU_PASSWORD

### Create Colors Chart

- comand: will create a "colors" table [id, name, hex-val]

csuMachine> mysql -u USER_ID -D USER_ID -h helmi -p < colors_setup.sq

   Enter Password: YOUR_CSU_PASSWORD




MariaDB [yourID]> SELECT * FROM colors;
| id | name   | hex_value |
|----|--------|-----------|
| 1  | Red    | #e74c3c   |
| 2  | Orange | #e67e22   |
| 3  | Yellow | #f1c40f   |
| 4  | Green  | #27ae60   |
| 5  | Blue   | #2980b9   |
| 6  | Purple | #8e44ad   |
| 7  | Grey   | #95a5a6   |
| 8  | Brown  | #7f5539   |
| 9  | Black  | #2c2c2c   |
| 10 | Teal   | #008080   |