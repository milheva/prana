# Prana Medical E-Commerce API Documentation

## 📋 Overview

Prana Medical API is a RESTful API for managing medical equipment e-commerce operations. This API supports authentication, product browsing, cart management, and order processing.

**Base URL:** `http://localhost:8000/api/v1`

**Version:** 1.0.0

---

## 🔐 Authentication

The API uses **Laravel Sanctum** for token-based authentication.

### Register

Create a new user account.

**Endpoint:** `POST /register`

**Request Body:**

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone": "081234567890"
}
```

**Response:** `201 Created`

```json
{
    "success": true,
    "message": "Registrasi berhasil",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "phone": "081234567890",
            "role": "customer"
        },
        "token": "1|abcdefghijklmnopqrstuvwxyz",
        "token_type": "Bearer"
    }
}
```

---

### Login

Authenticate and receive access token.

**Endpoint:** `POST /login`

**Request Body:**

```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Login berhasil",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "phone": "081234567890",
            "role": "customer"
        },
        "token": "2|abcdefghijklmnopqrstuvwxyz",
        "token_type": "Bearer"
    }
}
```

---

### Get Profile

Get authenticated user profile.

**Endpoint:** `GET /profile`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "081234567890",
        "role": "customer",
        "email_verified_at": null,
        "created_at": "2025-11-14T10:00:00.000000Z"
    }
}
```

---

### Update Profile

Update user profile information.

**Endpoint:** `PUT /profile`

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "name": "John Updated",
    "phone": "081234567899",
    "email": "johnupdated@example.com"
}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Profile berhasil diupdate",
    "data": {
        "id": 1,
        "name": "John Updated",
        "email": "johnupdated@example.com",
        "phone": "081234567899",
        "role": "customer"
    }
}
```

---

### Change Password

Change user password.

**Endpoint:** `PUT /profile/password`

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "current_password": "oldpassword123",
    "password": "newpassword123",
    "password_confirmation": "newpassword123"
}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Password berhasil diubah"
}
```

---

### Logout

Revoke access token.

**Endpoint:** `POST /logout`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Logout berhasil"
}
```

---

## 🛍️ Products

### Get All Products

Retrieve paginated list of products with filtering.

**Endpoint:** `GET /products`

**Query Parameters:**

-   `search` (string, optional) - Search by name, SKU, or description
-   `category_id` (integer, optional) - Filter by category ID
-   `min_price` (numeric, optional) - Minimum price
-   `max_price` (numeric, optional) - Maximum price
-   `in_stock` (boolean, optional) - Filter in-stock products
-   `is_featured` (boolean, optional) - Filter featured products
-   `sort_by` (string, optional, default: `created_at`) - Sort field
-   `sort_order` (string, optional, default: `desc`) - Sort direction (`asc`/`desc`)
-   `per_page` (integer, optional, default: 15) - Items per page

**Example:** `GET /products?search=thermometer&in_stock=true&per_page=10`

**Response:** `200 OK`

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Digital Thermometer",
            "slug": "digital-thermometer",
            "sku": "THERM-001",
            "description": "Accurate digital thermometer",
            "price": 150000,
            "formatted_price": "Rp 150.000",
            "stock": 50,
            "unit": "pcs",
            "is_active": true,
            "is_featured": true,
            "category": {
                "id": 1,
                "name": "Diagnostic Tools",
                "slug": "diagnostic-tools"
            },
            "in_stock": true,
            "stock_status": "in_stock",
            "created_at": "2025-11-14T10:00:00.000000Z",
            "updated_at": "2025-11-14T10:00:00.000000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 10,
        "total": 50,
        "from": 1,
        "to": 10
    },
    "links": {
        "first": "http://localhost:8000/api/v1/products?page=1",
        "last": "http://localhost:8000/api/v1/products?page=5",
        "prev": null,
        "next": "http://localhost:8000/api/v1/products?page=2"
    }
}
```

---

### Get Product by ID or Slug

Retrieve single product details.

**Endpoint:** `GET /products/{id_or_slug}`

**Example:** `GET /products/1` or `GET /products/digital-thermometer`

**Response:** `200 OK`

```json
{
    "data": {
        "id": 1,
        "name": "Digital Thermometer",
        "slug": "digital-thermometer",
        "sku": "THERM-001",
        "description": "Accurate digital thermometer",
        "price": 150000,
        "formatted_price": "Rp 150.000",
        "stock": 50,
        "unit": "pcs",
        "is_active": true,
        "is_featured": true,
        "category": {
            "id": 1,
            "name": "Diagnostic Tools",
            "slug": "diagnostic-tools"
        },
        "in_stock": true,
        "stock_status": "in_stock",
        "created_at": "2025-11-14T10:00:00.000000Z",
        "updated_at": "2025-11-14T10:00:00.000000Z"
    }
}
```

---

### Get Featured Products

Retrieve featured products.

**Endpoint:** `GET /products/featured`

**Query Parameters:**

-   `limit` (integer, optional, default: 8) - Number of products

**Response:** `200 OK`

```json
{
    "data": [
        {
            "id": 1,
            "name": "Digital Thermometer",
            "slug": "digital-thermometer",
            "sku": "THERM-001",
            "price": 150000,
            "formatted_price": "Rp 150.000",
            "stock": 50,
            "in_stock": true,
            "stock_status": "in_stock"
        }
    ]
}
```

---

### Get Related Products

Retrieve related products (same category).

**Endpoint:** `GET /products/{id}/related`

**Query Parameters:**

-   `limit` (integer, optional, default: 4) - Number of products

**Response:** `200 OK`

```json
{
    "data": [
        {
            "id": 2,
            "name": "Blood Pressure Monitor",
            "slug": "blood-pressure-monitor",
            "price": 250000,
            "formatted_price": "Rp 250.000"
        }
    ]
}
```

---

### Search Products

Search products by keyword.

**Endpoint:** `GET /search`

**Query Parameters:**

-   `q` (string, required, min: 2) - Search query

**Example:** `GET /search?q=thermometer`

**Response:** `200 OK`

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Digital Thermometer",
            "slug": "digital-thermometer",
            "price": 150000
        }
    ],
    "meta": {
        "current_page": 1,
        "total": 10
    }
}
```

---

### Get Categories

Retrieve all active categories.

**Endpoint:** `GET /categories`

**Response:** `200 OK`

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Diagnostic Tools",
            "slug": "diagnostic-tools",
            "description": "Medical diagnostic tools",
            "is_active": true,
            "products_count": 25,
            "created_at": "2025-11-14T10:00:00.000000Z"
        }
    ]
}
```

---

## 🛒 Cart Management

### Get Cart

Get user's cart items.

**Endpoint:** `GET /cart`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "data": {
        "items": [
            {
                "id": 1,
                "quantity": 2,
                "product": {
                    "id": 1,
                    "name": "Digital Thermometer",
                    "slug": "digital-thermometer",
                    "sku": "THERM-001",
                    "price": 150000,
                    "formatted_price": "Rp 150.000",
                    "stock": 50,
                    "unit": "pcs",
                    "is_active": true
                },
                "subtotal": 300000,
                "formatted_subtotal": "Rp 300.000"
            }
        ],
        "summary": {
            "total_items": 1,
            "total_quantity": 2,
            "subtotal": 300000
        }
    }
}
```

---

### Add to Cart

Add product to cart.

**Endpoint:** `POST /cart`

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "product_id": 1,
    "quantity": 2
}
```

**Response:** `201 Created`

```json
{
    "success": true,
    "message": "Produk berhasil ditambahkan ke keranjang",
    "data": {
        "id": 1,
        "quantity": 2,
        "product": {
            "id": 1,
            "name": "Digital Thermometer",
            "price": 150000
        },
        "subtotal": 300000
    }
}
```

---

### Update Cart Item

Update cart item quantity.

**Endpoint:** `PUT /cart/{cart_id}`

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "quantity": 5
}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Keranjang berhasil diupdate",
    "data": {
        "id": 1,
        "quantity": 5,
        "product": {
            "id": 1,
            "name": "Digital Thermometer"
        },
        "subtotal": 750000
    }
}
```

---

### Remove from Cart

Remove item from cart.

**Endpoint:** `DELETE /cart/{cart_id}`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Produk berhasil dihapus dari keranjang"
}
```

---

### Clear Cart

Remove all items from cart.

**Endpoint:** `DELETE /cart`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Keranjang berhasil dikosongkan"
}
```

---

### Get Cart Count

Get total items in cart.

**Endpoint:** `GET /cart/count`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "data": {
        "count": 3
    }
}
```

---

## 📦 Orders

### Get Orders

Get user's orders with filters.

**Endpoint:** `GET /orders`

**Headers:**

```
Authorization: Bearer {token}
```

**Query Parameters:**

-   `status` (string, optional) - Filter by status (`pending`, `processing`, `shipped`, `delivered`, `cancelled`)
-   `start_date` (date, optional) - Start date (YYYY-MM-DD)
-   `end_date` (date, optional) - End date (YYYY-MM-DD)
-   `sort_by` (string, optional, default: `created_at`)
-   `sort_order` (string, optional, default: `desc`)
-   `per_page` (integer, optional, default: 10)

**Response:** `200 OK`

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "order_number": "ORD-20251114-ABC123",
            "status": "pending",
            "status_label": "Menunggu Konfirmasi",
            "payment_method": "bank_transfer",
            "payment_method_label": "Transfer Bank",
            "payment_status": "unpaid",
            "payment_status_label": "Belum Dibayar",
            "subtotal": 300000,
            "formatted_subtotal": "Rp 300.000",
            "shipping_cost": 25000,
            "formatted_shipping_cost": "Rp 25.000",
            "total": 325000,
            "formatted_total": "Rp 325.000",
            "can_be_cancelled": true,
            "created_at": "2025-11-14T10:00:00.000000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "total": 5
    }
}
```

---

### Get Order Details

Get single order details.

**Endpoint:** `GET /orders/{order_id}`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "data": {
        "id": 1,
        "order_number": "ORD-20251114-ABC123",
        "status": "pending",
        "status_label": "Menunggu Konfirmasi",
        "payment_method": "bank_transfer",
        "payment_status": "unpaid",
        "subtotal": 300000,
        "shipping_cost": 25000,
        "total": 325000,
        "shipping": {
            "name": "John Doe",
            "phone": "081234567890",
            "address": "Jl. Contoh No. 123",
            "city": "Jakarta",
            "province": "DKI Jakarta",
            "postal_code": "12345",
            "full_address": "Jl. Contoh No. 123, Jakarta, DKI Jakarta, 12345"
        },
        "notes": "Please deliver in the morning",
        "items": [
            {
                "id": 1,
                "product_id": 1,
                "product_name": "Digital Thermometer",
                "product_sku": "THERM-001",
                "quantity": 2,
                "price": 150000,
                "formatted_price": "Rp 150.000",
                "subtotal": 300000,
                "formatted_subtotal": "Rp 300.000"
            }
        ],
        "customer": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "phone": "081234567890"
        },
        "can_be_cancelled": true,
        "created_at": "2025-11-14T10:00:00.000000Z",
        "updated_at": "2025-11-14T10:00:00.000000Z",
        "cancelled_at": null
    }
}
```

---

### Create Order (Checkout)

Create new order from cart items.

**Endpoint:** `POST /orders`

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "payment_method": "bank_transfer",
    "shipping_name": "John Doe",
    "shipping_phone": "081234567890",
    "shipping_address": "Jl. Contoh No. 123",
    "shipping_city": "Jakarta",
    "shipping_province": "DKI Jakarta",
    "shipping_postal_code": "12345",
    "notes": "Please deliver in the morning"
}
```

**Response:** `201 Created`

```json
{
    "success": true,
    "message": "Pesanan berhasil dibuat",
    "data": {
        "id": 1,
        "order_number": "ORD-20251114-ABC123",
        "status": "pending",
        "total": 325000,
        "formatted_total": "Rp 325.000"
    }
}
```

---

### Cancel Order

Cancel pending order.

**Endpoint:** `POST /orders/{order_id}/cancel`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "message": "Pesanan berhasil dibatalkan",
    "data": {
        "id": 1,
        "order_number": "ORD-20251114-ABC123",
        "status": "cancelled",
        "cancelled_at": "2025-11-14T11:00:00.000000Z"
    }
}
```

---

### Get Order Statistics

Get user's order statistics.

**Endpoint:** `GET /orders/statistics`

**Headers:**

```
Authorization: Bearer {token}
```

**Response:** `200 OK`

```json
{
    "success": true,
    "data": {
        "total_orders": 10,
        "pending_orders": 2,
        "completed_orders": 7,
        "total_spent": 5000000
    }
}
```

---

## 🏥 Health Check

Check API health status.

**Endpoint:** `GET /health`

**Response:** `200 OK`

```json
{
    "status": "ok",
    "timestamp": "2025-11-14T10:00:00.000000Z",
    "version": "1.0.0"
}
```

---

## 📝 Error Responses

All error responses follow this format:

```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        "field_name": ["Validation error message"]
    }
}
```

### Common HTTP Status Codes

-   `200 OK` - Request successful
-   `201 Created` - Resource created successfully
-   `400 Bad Request` - Invalid request data
-   `401 Unauthorized` - Authentication required or token invalid
-   `403 Forbidden` - Insufficient permissions
-   `404 Not Found` - Resource not found
-   `422 Unprocessable Entity` - Validation failed
-   `500 Internal Server Error` - Server error

---

## 🔒 Rate Limiting

API requests are rate-limited to prevent abuse:

-   **Authenticated requests:** 60 requests per minute
-   **Guest requests:** 30 requests per minute

Rate limit headers are included in responses:

```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
```

---

## 💡 Best Practices

1. **Always include Authorization header** for protected endpoints
2. **Use pagination** parameters for list endpoints
3. **Handle errors gracefully** - check `success` field in responses
4. **Cache product data** when appropriate
5. **Validate data client-side** before sending requests
6. **Use HTTPS** in production

---

## 📞 Support

For API support, contact: **info@pranamedical.com**

---

**Last Updated:** November 14, 2025
