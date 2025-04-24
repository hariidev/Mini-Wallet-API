# 💸 Simple PHP Wallet API

A lightweight wallet API built using pure PHP (no frameworks), using file-based JSON storage.  
Supports deposit, withdrawal, balance inquiry, and transaction history.


## 📦 Features

- RESTful API endpoints:
  - `POST /deposit` – Deposit money
  - `POST /withdraw` – Withdraw money
  - `GET /balance` – Get current balance
  - `GET /transactions` – Get transaction history
- File-based persistent storage (`wallet.json`)
- Input validation (e.g., prevents negative amounts, overdrafts)
- Simple transaction logging