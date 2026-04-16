Here’s the full **README.md content wrapped inside a code block** so you can copy‑paste it directly into your GitHub editor:

```markdown
# 📘 PhonePe Payment Gateway v2 – PHP Integration

This repository contains a **PhonePe Payment Gateway v2 (OAuth-based) integration** using PHP. It demonstrates how to implement secure payment flows in a sandbox environment and prepare for production readiness.

---

## 🚀 Features

- ✅ OAuth authentication with PhonePe PG v2  
- ✅ Redirect-based checkout (opens PhonePe app on mobile)  
- ✅ QR / UPI support for desktop payments  
- ✅ Clean payment form UI  
- ✅ Payment success confirmation page  
- ✅ Server-to-server payment verification  
- ✅ Webhook support for reliable confirmation  
- ✅ UAT and Production configuration support  

---

## 🗂️ Project Structure
phonepe-payment-v2/
│
├── config.php               # Environment & credential configuration
├── phonepe-token.php        # OAuth access token generation
├── pay.php                  # Payment form (UI)
├── process-pay.php          # Create payment & redirect to PhonePe
├── phonepe-webhook.php      # Webhook handler
├── payment-success.php      # Payment success UI
└── README.md                # Documentation
```

---

## 🔧 Requirements

- PHP 8.0 or higher  
- cURL enabled  
- HTTPS (mandatory for production)  
- PhonePe Merchant Account (UAT & PROD credentials)  

---

## ⚙️ Configuration

Update `config.php` with your credentials:

```php
define('PHONEPE_CLIENT_ID', 'YOUR_CLIENT_ID');
define('PHONEPE_CLIENT_SECRET', 'YOUR_CLIENT_SECRET');
define('PHONEPE_CLIENT_VERSION', 1);

// UAT
define('PHONEPE_OAUTH_URL', 'https://api-preprod.phonepe.com/apis/pg-sandbox/v1/oauth/token');
define('PHONEPE_BASE_URL',  'https://api-preprod.phonepe.com/apis/pg-sandbox');

// PROD (use when live)
// define('PHONEPE_OAUTH_URL', 'https://api.phonepe.com/apis/v1/oauth/token');
// define('PHONEPE_BASE_URL',  'https://api.phonepe.com/apis/pg');
```

---

## 💳 Payment Flow

1. User opens `pay.php` and enters amount  
2. Backend generates OAuth token and creates PhonePe payment  
3. User is redirected to PhonePe checkout  
   - 📱 PhonePe app opens on mobile  
   - 💻 QR / UPI shown on desktop  
4. User completes payment  
5. PhonePe redirects to `payment-success.php`  
6. Backend verifies payment using Status API or Webhook  

---

## ✅ Payment Verification (Mandatory)

Do **not** trust redirect alone.  
Always verify using:

```
GET /checkout/v2/order/{merchantOrderId}/status
```

Accept payment only if:

```json
"state": "COMPLETED"
```

---

## 🔔 Webhooks (Recommended for Production)

PhonePe sends payment updates to your webhook endpoint:

```
https://yourdomain.com/phonepe-webhook.php
```

**Benefits:**
- Works even if user closes browser  
- Reliable payment confirmation  
- Prevents missed payments  

Always respond with **HTTP 200 OK**.

---

## 🧪 Testing (UAT)

- Use UAT credentials  
- Test with small amounts  
- Verify:  
  - Redirect works  
  - Status API returns `COMPLETED`  
  - Webhook is triggered  

---

## 🚀 Go‑Live Checklist

- ✅ Switch to Production credentials  
- ✅ Update OAuth & Base URLs  
- ✅ Use HTTPS for all URLs  
- ✅ Enable SSL verification  
- ✅ Verify payments server‑side  
- ✅ Configure webhooks  

---

## 🔒 Security Best Practices

- Never expose client secrets  
- Always verify payment status  
- Make webhook handling idempotent  
- Log API & webhook responses  
- Validate order amount and order ID  

---

## 🧾 License

This project is for **internal / integration use**.  
Follow PhonePe’s official terms and conditions for production usage.

---

## 📞 Support

For issues:  
- Check PhonePe Merchant Dashboard  
- Review webhook and API logs  
- Contact PhonePe Support if required  
```

