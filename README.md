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
| ------ |:---:|:-----------:|
| POST   | /register                               |*|
| POST   | /oauth/token                            | login |
| GET    | /v1/users                               |*|
| GET    | /v1/users/{id}                          |*|
| PUT    | /v1/users/{id}                          |*|
| DELETE | /v1/users/{id}                          |*|
| GET    | /v1/recipes                             |*|
| GET    | /v1/recipes/{id}                        |*|
| POST   | /v1/recipes                             |*|
| PUT    | /v1/recipes/{id}                        |*| 
| DELETE | /v1/recipes/{id}                        |*|

