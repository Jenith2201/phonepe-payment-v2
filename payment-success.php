<?php
$orderId = $_GET['orderId'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
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

        .success-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 35px 30px;
            border-radius: 18px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            text-align: center;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #4CAF50;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkmark svg {
            width: 40px;
            height: 40px;
            color: #fff;
        }

        h2 {
            color: #333;
            margin-bottom: 8px;
        }

        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .order-box {
            background: #f6f6f6;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #444;
            word-break: break-all;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            background: #5f259f;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #4a1e7c;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }

        @media (max-width: 480px) {
            .success-card {
                margin: 20px;
            }
        }
    </style>
</head>
<body>

<div class="success-card">

    <div class="checkmark">
        <!-- SVG Check Icon -->
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
    </div>

    <h2>Payment Successful</h2>
    <p>Your payment has been completed successfully.</p>

    <?php if ($orderId): ?>
        <div class="order-box">
            <strong>Order ID</strong><br>
            <?php echo htmlspecialchars($orderId); ?>
        </div>
    <?php endif; ?>

    <a href="pay.php" class="btn">Make Another Payment</a>

    <div class="footer-text">
        🔒 Secured by PhonePe
    </div>

</div>

</body>
</html>
<?php
/*echo "<h2>Returned from PhonePe</h2>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

echo "<p>Do NOT trust this page alone. Verify payment via Status API.</p>";*/
?>
