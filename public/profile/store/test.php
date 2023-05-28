<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="/libs/jquery-3.6.0.js" type="text/javascript"></script>

    <link rel="stylesheet/less" type="text/css" href="./test.less">
    <script src="/libs/less.js" type="text/javascript"></script>
</head>

<body>

    <div class="test"></div>

    <button class="orange" style="width: 100px; height: 50px; color: orange">Change color</button>
    <button class="green" style="width: 100px; height: 50px; color: green">Change color</button>
    <button class="blue" style="width: 100px; height: 50px; color: blue">Change color</button>

    <script>
        $(".orange").on("click", function() {
            less.modifyVars({
                "@color": "ff782e"
            });
        });

        $(".green").on("click", function() {
            less.modifyVars({
                "@color": "32ff32"
            });
        });

        $(".blue").on("click", function() {
            less.modifyVars({
                "@color": "0000ff"
            });
        });
    </script>
</body>

</html>