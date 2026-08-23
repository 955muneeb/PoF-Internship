# Student Portal API - Documentation

## Base URL
`http://localhost:8000/api`

## Authentication
This API uses **Laravel Sanctum** for token-based authentication. 
All protected routes require an `Authorization` header:
`Authorization: Bearer <your_token_here>`

---

## 1. Authentication Endpoints

### Register a New Admin
* **URL:** `/register`
* **Method:** `POST`
* **Body (JSON):**
  ```json
  {
      "name": "Admin Name",
      "email": "admin@api.com",
      "password": "password123"
  }
