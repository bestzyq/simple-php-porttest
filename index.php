<!-- index.php -->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Test</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Port Test</h1>
        <form method="POST" action="/">
            <div class="mb-3">
                <label for="ip" class="form-label">IP地址（例如：[2001:da8:8007:1::3]）</label>
                <input type="text" class="form-control" id="ip" name="ip" required>
            </div>
            <div class="mb-3">
                <label for="port" class="form-label">端口号（例如：53）</label>
                <input type="text" class="form-control" id="port" name="port" required>
            </div>
            <button type="submit" class="btn btn-primary">测试连通性</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            function portTest($ip, $port) {
                $socket = @fsockopen($ip, $port, $errno, $errstr, 1);
                if ($socket) {
                    echo "<p>端口 $port 连通性： 成功</p>";
                    fclose($socket);
                } else {
                    echo "<p>端口 $port 连通性： 失败</p>";
                }
            }

            // 获取用户输入的IP和端口
            $ip = $_POST['ip'];
            $port = $_POST['port'];

            // 测试指定IP和端口的连通性
            portTest($ip, $port);
        }
        ?>
    </div>

    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
