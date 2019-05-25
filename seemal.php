<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
        function hy(){
            $("#intro").load("test.php","q=oye1");
        }

    </script>
    <title>POS | Login</title>

</head>

<body>
<p id="intro">HELLO</p>
<button onclick="hy()">CLICK</button>
</body>
</html>
