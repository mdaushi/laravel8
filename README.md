<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Dokumentasi

-   arsitektur MVC + repository pattern
-   authentication features with Breeze
-   auth api with sanctum
-   Postman: https://documenter.getpostman.com/view/7711393/2s935hQSjS

---

#### AUTH

<details>
 <summary><code>POST</code> <code><b>/api/register</b></code> <code>Register</code></summary>

##### Headers

-   Accept: application/json

##### Body

```JSON
{
    "name": "firdaus",
    "email": "firdaus@gmail.com",
    "password": "1234567890",
    "password_confirmation": "1234567890",
    "phone": "09876543"
}
```

##### Example cURL

> ```javascript
>  curl --location --request POST 'http://127.0.0.1:8000/api/register' \
> --header 'Accept: application/json'
> ```

</details>

<details>
 <summary><code>POST</code> <code><b>/api/login</b></code> <code>Login</code></summary>

##### Headers

-   Accept: application/json

##### Body

```JSON
{
    "email": "firdaus@gmail.com",
    "password": "1234567890"
}
```

##### Example cURL

> ```javascript
> curl --location --request POST 'http://127.0.0.1:8000/api/login' \
> --header 'Accept: application/json'
> ```

</details>

<details>
 <summary><code>POST</code> <code><b>/api/logout</b></code> <code>Logout</code></summary>

##### Headers

-   Accept: application/json
-   Authorization: Bearer

##### Example cURL

> ```javascript
> curl --location --request POST 'http://127.0.0.1:8000/api/logout' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

---

#### PROFILE

<details>
 <summary><code>GET</code> <code><b>/api/profile</b></code> <code>INDEX</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

</details>

<details>
 <summary><code>POST</code> <code><b>/api/profile</b></code> <code>UPDATE PROFILE</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Body

```json
{
    "picture": "",
    "full_name": "",
    "email": "",
    "phone": "",
    "devisi": "",
    "company": ""
}
```

##### Example cURL

> ```javascript
> curl --location --request POST 'http://127.0.0.1:8000/api/profile' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

---

#### DOCUMENT MANAGEMENT

<details>
  <summary><code>GET</code> <code><b>/api/documents</b></code> <code>INDEX</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Example cURL

> ```javascript
> curl --location --request GET 'http://127.0.0.1:8000/api/documents' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

<details>
  <summary><code>POST</code> <code><b>/api/documents</b></code> <code>CREATE</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Body

```json
{
    "title": "surat dinas",
    "content": "file.pdf",
    "signing": 11
}
```

##### Example cURL

> ```javascript
> curl --location --request POST 'http://127.0.0.1:8000/api/documents' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer ' \
> --data-raw ''
> ```

</details>

<details>
  <summary><code>PUT</code> <code><b>/api/documents/:id</b></code> <code>UPDATE</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Body

```json
{
    "title": "surat dinas",
    "content": "file.pdf",
    "signing": 11
}
```

##### Example cURL

> ```javascript
> curl --location --request PUT 'http://127.0.0.1:8000/api/documents/37' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

<details>
  <summary><code>DELETE</code> <code><b>/api/documents/:id</b></code> <code>DELETE</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Example cURL

> ```javascript
> curl --location --request DELETE 'http://127.0.0.1:8000/api/documents/37' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

<details>
  <summary><code>GET</code> <code><b>/api/documents/:id/verify</b></code> <code>VERIFY</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Example cURL

> ```javascript
> curl --location --request GET 'http://127.0.0.1:8000/api/documents/37/verify' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

<details>
  <summary><code>GET</code> <code><b>/api/documents/list-signing</b></code> <code>LIST SIGNING</code></summary>

##### Headers

-   Accept : application/json
-   Authorization : Bearer

##### Example cURL

> ```javascript
> curl --location --request GET 'http://127.0.0.1:8000/api/documents/list-signing' \
> --header 'Accept: application/json' \
> --header 'Authorization: Bearer '
> ```

</details>

---
