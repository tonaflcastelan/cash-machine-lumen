---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_44652685eefa8022f19b92a3ce78d990 -->
## Authenticate a user and return the token if the provided credentials are correct.

> Example request:

```bash
curl -X POST \
    "http://localhost/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST auth/login`


<!-- END_44652685eefa8022f19b92a3ce78d990 -->

<!-- START_7301a4b24d2dee44eceb7751b6940dba -->
## Get accounts by user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/accounts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/accounts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET accounts`


<!-- END_7301a4b24d2dee44eceb7751b6940dba -->

<!-- START_0ea22f046cdf2cebd6b9ab90dc4a0d12 -->
## Make a withdraw from the account

> Example request:

```bash
curl -X POST \
    "http://localhost/withdraw" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/withdraw"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST withdraw`


<!-- END_0ea22f046cdf2cebd6b9ab90dc4a0d12 -->

<!-- START_48eb8351f36c52d178ebccb279cd8d71 -->
## Make a payment transaction

> Example request:

```bash
curl -X POST \
    "http://localhost/payment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/payment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST payment`


<!-- END_48eb8351f36c52d178ebccb279cd8d71 -->


