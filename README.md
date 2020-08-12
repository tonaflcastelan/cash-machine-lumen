# Cash Machine - Lumen

## Rules
- A user has 'N' accounts
- An account can be credit or debit type
- An account has 'X' credit or available amount
- A user can withdraw from the credit account with a 10% commission cost, only if the user has enough credit
- A user can pay only for his credit account
- A user can withdraw from the debit account only if the user has enough amount
- A user can deposit more in his debit account


## Clone

Clone this repo in your local enviroment **git@github.com:tonaflcastelan/cash-machine-lumen.git**

## Installation

Before continuing, make sure you have **make** command installed. If you do not have it installed you must install it.
After that, you need to run this command:

```bash
make install
```

This command execute the install dependencies.


## JWT_KEY

This application use JWT as authentication method, run this command to generate the random string key:

```bash
make jwt_key
```

Copy the result and paste into the .env file in the **JWT_KEY**. Example: **JWT_KEY=qwertyuiop**

## Database setup

Open the .env file and setup the enviroment vars **DB_DATABASE**, **DB_USERNAME** and **DB_PASSWORD** with your own credentials

## Migrations

To create the tables run this command:

```bash
make migrations
```

## Seeders

To populate the tables run this command:

```bash
make seeds
```

# Start local server

To start the local server run this command:

```bash
make start
```

Check the local server status in your terminal or enter in this [link](http://127.0.0.1:8000)

# Documentation

To generate the documentation for this application, run this command:

```bash
make documentation
```

To access the documentation enter in this [link](http://127.0.0.1:8000/docs/index.html)