# Email Queue Server

## Overview
The **Email Queue Server** is a backend service built in **PHP** that allows users to schedule emails to be sent at a specific time. The system uses **Redis** as a message queue to temporarily store email requests and processes them asynchronously using a worker script. It follows **Object-Oriented Programming (OOP)** principles and applies multiple **design patterns** to ensure flexibility, maintainability, and scalability.

## Key Features
✅ **Schedule Emails via API** - Clients can send a POST request with the recipient’s email, message content, and scheduled send time.  
✅ **Redis-based Queue System** - Emails are stored in Redis and processed at the correct time.  
✅ **Asynchronous Processing** - A worker script constantly checks and sends emails when due.  
✅ **Support for Multiple Email Providers** - Uses the **Strategy Pattern** to switch between SMTP, SendGrid, or Mailgun.  
✅ **Logging & Monitoring** - Logs all successfully sent emails into a file for tracking.  
✅ **Retry Mechanism** - If an email fails, it is retried up to **3 times** before being logged as failed.  

## API Endpoints
### 1. Schedule an Email
**Endpoint:** `POST /api/schedule-email`  
**Description:** Adds an email to the queue to be sent at a scheduled time.  

#### Request Body (JSON)
```json
{
  "email": "user@example.com",
  "content": "Hello, this is a test email!",
  "send_at": "2025-02-12T15:00:00Z"
}
```

#### Response (JSON)
```json
{
  "success": true,
  "task_id": "f81d4fae-7dec-11d0-a765-00a0c91e6bf6",
  "message": "Email scheduled successfully."
}
```

