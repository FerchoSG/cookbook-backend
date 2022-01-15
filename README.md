# cookbook api

## this is basic API Rest using passport authentication 

for the moment the API has only two models since the cookbook stores only recipes and users

## Models

### users

| id | name | email | password | created_at | updated_at | 
| -- |:----:|:-----:|:--------:|:----------:| ----------:|
|autoincrement | string | string unique | string | timestamp | timestamp |

### recipes

| id | title | description | image | ingredients | user_id | created_at | updated_at | 
| -- |:-----:|:-----------:|:-----:|:-----------:|:-------:|:----------:| ----------:|
|autoincrement | string | string | string | string | bigint | timestamp | timestamp |


## Routes 

| Method | uri | description |
| ------ |-----|:-----------:|
| POST   | /register                               |*|
| POST   | /oauth/token                            | login |
| GET    | /api/users                               |*|
| GET    | /api/users/{id}                          |*|
| PUT    | /api/users/{id}                          |*|
| DELETE | /api/users/{id}                          |*|
| GET    | /api/recipes                             |*|
| GET    | /api/recipes/{id}                        |*|
| POST   | /api/recipes                             |*|
| PUT    | /api/recipes/{id}                        |*| 
| DELETE | /api/recipes/{id}                        |*|

---
login request format
```json
    "grant_type": "",
    "client_id": "",
    "client_secret": "",
    "password": "",
    "username": "",
    "scope": ""
```
