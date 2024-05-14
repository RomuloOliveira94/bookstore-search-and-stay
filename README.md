
<h1 align="center" style="font-weight: bold;">Search and Stay BookStore <img src="https://github.com/RomuloOliveira94/bookstore-search-and-stay/assets/99622544/c147ea3c-0f9f-4c7d-9a85-8a2f5057416d" width="50" height="50" align="center"/>
</h1>

<div align="center"> 
    
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)

</div>

<p align="center">
 <a href="#started">Getting Started</a> • 
  <a href="#routes">API Endpoints</a> 
</p>

<p align="center">
  <b>Rest api created for bookstore management</b>
</p>

<h2 id="started">🚀 Getting started</h2>

<h3>Prerequisites</h3>

- [PHP 8+](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/)
- [Node](https://nodejs.org/en)
- [Git](https://git-scm.com/)

<h3>Cloning</h3>

```bash
git clone https://github.com/RomuloOliveira94/bookstore-search-and-stay.git
```

<h3> Environment Variables</h2>

Use the `.env.example` as reference to create your configuration file `.env` with your Database Credentials

```yaml
DB_USERNAME={your-user-name}
DB_PASSWORD={your-password}
```

<h3>Starting</h3>

How to start the project

```bash
cd bookstore-search-and-stay
composer install
php artisan key:generate
php artisan migrate
php artisan serve
``````

<h2 id="routes">📍 API Endpoints</h2>

Send the bearer token for every request except "login" and "register".
​
| route               | description                                          
|----------------------|-----------------------------------------------------
| <kbd>POST api/v1/register</kbd>     | register and authenticate new user [response details](#register)
| <kbd>POST api/v1/login</kbd>     | authenticate user see [response details](#login)
| <kbd>POST api/v1/logout</kbd>     | revoke user token see [request details](#logout)
| <kbd>GET api/v1/books</kbd>     | show all books with stores see [request details](#books_index)
| <kbd>POST api/v1/books</kbd>     | create a new book see [request details](#books_create)
| <kbd>GET api/v1/books/{id}</kbd>     | show a book by id with store see [response details](#books_show)
| <kbd>PUT api/v1/books/{id}</kbd>     | update a book by id see [request details](#books_update)
| <kbd>DELETE api/v1/books/{id}</kbd>     | delete a book by id 
| <kbd>GET api/v1/stores</kbd>     | show all stores see [request details](#store_index)
| <kbd>POST api/v1/stores</kbd>     | create a store see [response details](#store_create)
| <kbd>GET api/v1/stores/{id}</kbd>     | show a store by id see [request details](#store_show)
| <kbd>PUT api/v1/stores/{id}</kbd>     | upadate a store by id [response details](#store_update)
| <kbd>DELETE api/v1/stores/{id}</kbd>     | delete a store by id 
| <kbd>POST api/v1/books/{id}/stores/{id}</kbd>     | create book and store relation with quantity data see [response details](#book_store_create)
| <kbd>PUT api/v1/books/{id}/stores/{id}</kbd>     | update the quantity from book and store pivot table [response details](#book_store_update)
| <kbd>DELETE api/v1/books/{id}/stores/{id}</kbd>     | remove the relation between book and store [request details](#book_store_delete)


<h3 id="register">POST api/v1/register</h3>

**REQUEST**
```json
{
  "name": "romindev",
  "email": "romin@romin.dev",
  "password": "password"
}
```

**RESPONSE**
```json
{
    "access_token": "2|zdriL5lPVJCxvYVI1wffgB6eaMkCfRDRJwV0P8Wn385b7db9",
    "token_type": "Bearer"
}
```

<h3 id="login">POST api/v1/login</h3>

**REQUEST**
```json
{
  "name": "romindev",
  "email": "romin@romin.dev",
  "password": "password"
}
```

**RESPONSE**
```json
{
    "access_token": "2|zdriL5lPVJCxvYVI1wffgB6eaMkCfRDRJwV0P8Wn385b7db9",
    "token_type": "Bearer"
}
```

<h3 id="logout">POST api/v1/logout</h3>


**RESPONSE**
```json
{
    "message": "Logged out"
}
```

<h3 id="books_index">GET api/v1/books</h3>

**RESPONSE**
```json
[
    {
        "id": 6,
        "name": "Isobel O'Kon",
        "ISBN": 695609629,
        "value": "387.70",
        "created_at": "2024-05-11T21:56:43.000000Z",
        "updated_at": "2024-05-11T21:56:43.000000Z",
        "stores": [
            {
                "id": 1,
                "name": "Breana Daugherty",
                "address": "629 Isabella Lodge Apt. 962\nKozeyburgh, NV 18499",
                "active": 1,
                "created_at": "2024-05-11T21:56:43.000000Z",
                "updated_at": "2024-05-11T21:56:43.000000Z",
                "pivot": {
                    "book_id": 6,
                    "store_id": 1,
                    "quantity": 5
                }
            }
        ]
    },
    {
        "id": 7,
        "name": "Maximilian Walter",
        "ISBN": 188655910,
        "value": "666.11",
        "created_at": "2024-05-11T21:56:43.000000Z",
        "updated_at": "2024-05-11T21:56:43.000000Z",
        "stores": [
            {
                "id": 5,
                "name": "Timmothy Ondricka III",
                "address": "60148 Dashawn Center\nNew Riley, NH 13555",
                "active": 1,
                "created_at": "2024-05-11T21:56:43.000000Z",
                "updated_at": "2024-05-11T21:56:43.000000Z",
                "pivot": {
                    "book_id": 7,
                    "store_id": 5,
                    "quantity": 2
                }
            },
            {
                "id": 13,
                "name": "Eduardo Cassin Jr.",
                "address": "488 Nathanial Views\nNorth Rudyville, ID 44242-1941",
                "active": 0,
                "created_at": "2024-05-11T22:22:41.000000Z",
                "updated_at": "2024-05-11T22:22:41.000000Z",
                "pivot": {
                    "book_id": 7,
                    "store_id": 13,
                    "quantity": 1
                }
            },
       ]
    }
]
```

<h3 id="books_create">POST api/v1/books</h3>

**REQUEST**
```json
{
    "name": "Game of Thrones",
    "ISBN": 123452, 
    "value": 60.59
}
```

**RESPONSE**
```json
{
    "name": "Game of Thrones",
    "ISBN": 123452,
    "value": 60.59,
    "updated_at": "2024-05-12T00:22:36.000000Z",
    "created_at": "2024-05-12T00:22:36.000000Z",
    "id": 36
}
```


<h3 id="books_show">GET api/v1/books/{id}</h3>

**RESPONSE**
```json
{
    "id": 6,
    "name": "Isobel O'Kon",
    "ISBN": 695609629,
    "value": "387.70",
    "created_at": "2024-05-11T21:56:43.000000Z",
    "updated_at": "2024-05-11T21:56:43.000000Z",
    "stores": [
        {
            "id": 1,
            "name": "Breana Daugherty",
            "address": "629 Isabella Lodge Apt. 962\nKozeyburgh, NV 18499",
            "active": 1,
            "created_at": "2024-05-11T21:56:43.000000Z",
            "updated_at": "2024-05-11T21:56:43.000000Z",
            "pivot": {
                "book_id": 6,
                "store_id": 1,
                "quantity": 5
            }
        }
    ]
}
```

<h3 id="books_update">PUT api/v1/books/{id}</h3>

**REQUEST**
```json
{
    "name": "Game of Thrones House of the Dragon",
    "ISBN": 123452, 
    "value": 65.59
}
```

<h3 id="stores_index">GET api/v1/stores</h3>

**RESPONSE**
```json
[
    {
        "id": 1,
        "name": "Breana Daugherty",
        "address": "629 Isabella Lodge Apt. 962\nKozeyburgh, NV 18499",
        "active": 1,
        "created_at": "2024-05-11T21:56:43.000000Z",
        "updated_at": "2024-05-11T21:56:43.000000Z",
        "books": [
            {
                "id": 6,
                "name": "Isobel O'Kon",
                "ISBN": 695609629,
                "value": "387.70",
                "created_at": "2024-05-11T21:56:43.000000Z",
                "updated_at": "2024-05-11T21:56:43.000000Z",
                "pivot": {
                    "store_id": 1,
                    "book_id": 6,
                    "quantity": 5
                }
            },
            {
                "id": 26,
                "name": "Cordie Hackett",
                "ISBN": 34359,
                "value": "52.59",
                "created_at": "2024-05-11T22:22:41.000000Z",
                "updated_at": "2024-05-11T22:22:41.000000Z",
                "pivot": {
                    "store_id": 1,
                    "book_id": 26,
                    "quantity": 5
                }
            }
        ]
    },
    {
        "id": 2,
        "name": "Elmer Kling",
        "address": "8630 Ritchie Harbors\nNew Dorotheashire, CT 47761",
        "active": 1,
        "created_at": "2024-05-11T21:56:43.000000Z",
        "updated_at": "2024-05-11T21:56:43.000000Z",
        "books": [],
    }
]
```

<h3 id="stores_create">POST api/v1/stores</h3>

**REQUEST**
```json
{
    "name": "Romin Bookstore",
    "address": "13h avenue",
    "active" : true
}
```

**RESPONSE**
```json
{
    "name": "Romin Bookstore",
    "address": "13h avenue",
    "active" : true,
    "updated_at": "2024-05-12T02:53:39.000000Z",
    "created_at": "2024-05-12T02:53:39.000000Z",
    "id": 23
}
```


<h3 id="stores_show">GET api/v1/stores/{id}</h3>

**RESPONSE**
```json
{
        "id": 1,
        "name": "Breana Daugherty",
        "address": "629 Isabella Lodge Apt. 962\nKozeyburgh, NV 18499",
        "active": 1,
        "created_at": "2024-05-11T21:56:43.000000Z",
        "updated_at": "2024-05-11T21:56:43.000000Z",
        "books": [
            {
                "id": 6,
                "name": "Isobel O'Kon",
                "ISBN": 695609629,
                "value": "387.70",
                "created_at": "2024-05-11T21:56:43.000000Z",
                "updated_at": "2024-05-11T21:56:43.000000Z",
                "pivot": {
                    "store_id": 1,
                    "book_id": 6,
                    "quantity": 5
                }
            },
            {
                "id": 26,
                "name": "Cordie Hackett",
                "ISBN": 34359,
                "value": "52.59",
                "created_at": "2024-05-11T22:22:41.000000Z",
                "updated_at": "2024-05-11T22:22:41.000000Z",
                "pivot": {
                    "store_id": 1,
                    "book_id": 26,
                    "quantity": 5
                }
            }
        ]
    },
```

<h3 id="stores_update">PUT api/v1/stores/{id}</h3>

**REQUEST**
```json
{
    "name": "Rometas Bookstore",
    "address": "cachimbo avenue",
    "active" : false
}
```

<h3 id="book_store_create">POST api/v1/books/{id}/stores/{id}</h3>

**REQUEST**
```json
{
    "quantity": 1
}
```

**RESPONSE**
```json
{
    "message": "Store added to book"
}
```

<h3 id="book_store_update">PUT api/v1/books/{id}/stores/{id}</h3>

**REQUEST**
```json
{
    "quantity": 5
}
```

**RESPONSE**
```json
{
   "message": "Store updated in book"
}
```

<h3 id="book_store_delete">PUT api/v1/books/{id}/stores/{id}</h3>

**RESPONSE**
```json
{
   "message": "Store removed from book"
}
```



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
