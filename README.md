💸 Simple PHP Wallet API

A lightweight wallet API built using pure PHP (no frameworks), using file-based JSON storage.  
Supports deposit, withdrawal, balance inquiry, and transaction history.


📦 Features

- RESTful API endpoints:
  - `POST /deposit` – Deposit money
  - `POST /withdraw` – Withdraw money
  - `GET /balance` – Get current balance
  - `GET /transactions` – Get transaction history
- File-based persistent storage (`wallet.json`)
- Input validation (e.g., prevents negative amounts, overdrafts)
- Simple transaction logging

⚙️ Setup Instructions

1. Clone or Download

git clone https://github.com/hariidev/Mini-Wallet-API.git

2. Start the PHP Server

php -S localhost:8000 wallet.php

📬 API Usage (Using Query Parameters)

➕ Deposit

POST http://localhost:8000/deposit?user_id=user1&amount=100


➖ Withdraw

POST http://localhost:8000/withdraw?user_id=user1&amount=50

💰 Get Balance

GET http://localhost:8000/transactions?user_id=user1


📜 Get Transactions

GET http://localhost:8000/transactions?user_id=user1


🧠 Assumptions

All users are identified by a simple user_id (string).

Storage is kept in a local file named wallet.json.

Each request is stateless; no sessions or auth are implemented.

Input must be valid numbers and non-negative for amounts.