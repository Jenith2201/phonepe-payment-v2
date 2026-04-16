<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pay with PhonePe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #5f259f, #7b3fe4);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-card {
            background: #fff;
            width: 100%;
            max-width: 380px;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 120px;
        }

        h2 {
            margin: 0 0 10px;
            color: #333;
        }

        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #5f259f;
        }

        button {
            width: 100%;
            background: #5f259f;
            color: #fff;
            border: none;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #4a1e7c;
        }

        .secure-text {
            margin-top: 15px;
            font-size: 12px;
            color: #888;
        }

        .secure-text span {
            color: #5f259f;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .payment-card {
                margin: 20px;
            }
        }
    </style>
</head>
<body>

<div class="payment-card">

    <div class="logo">
        <!-- Optional: PhonePe logo -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/PhonePe_Logo.png" alt="PhonePe">
    </div>

    <h2>Pay with PhonePe</h2>
    <p>Fast • Secure • Trusted</p>

    <form action="process-pay.php" method="POST">
        <div class="input-group">
            <label>Amount (INR)</label>
            <input type="number" name="amount" min="1" value="100" required>
        </div>

        <button type="submit">Pay Now</button>
    </form>

    <div class="secure-text">
        🔒 100% Secure payments powered by <span>PhonePe</span>
    </div>

</div>

</body>
</html>
