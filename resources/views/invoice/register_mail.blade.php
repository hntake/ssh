<!DOCTYPE html>
<html lang="ja">
<title>パスワードリセット</title>
<style>
#button {
    width: 200px;
    text-align: center;
}
#button a {
    padding: 10px 20px;
    display: block;
    border: 1px solid #2a88bd;
    background-color: #FFFFFF;
    color: #2a88bd;
    text-decoration: none;
    box-shadow: 2px 2px 3px #f5deb3;
}
#button a:hover {
    background-color: #2a88bd;
    color: #FFFFFF;
}
</style>
<body>
<p id="button">
<a href="{{ url('/invoice/email/verify/'   . $email_verify_token) }}">あなたのメールアドレスを検証するためにこちらをクリックしてください．</a>
</p>

<p>心当たりが無い場合は無視してください．</p>
</body>
</html>