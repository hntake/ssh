<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>QRコード一覧</title>
    <style>
        /* PDFのレイアウト調整 */
        .qr-code-container {
            display: flex;
            flex-wrap: wrap;
        }
        .qr-code-item {
            width: 150px;
            text-align: center;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>QR code list</h1>
    <div class="qr-code-container">
        @foreach ($products as $product)
            <div class="qr-code-item">
                <p>{{ $product->product_name }}</p>
                <img src="{{ $product->base64QrCode }}" alt="QR Code">            
            </div>
        @endforeach
    </div>
</body>
</html>