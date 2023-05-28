<head>
    <script src="/libs/jquery-3.6.0.js"></script>
</head>
<script>
    $.ajax({
        type: "POST",
        url: "test.php",
        data: {
            test: "hello ajax!"
        },
        cache: false,
        success: function(responseText) {
            alert(responseText);
        }
    })
    /*
    .done( function () {
        alert("Success!");
    }).fail(function() {
        alert("Fail!");
    })
    */
    ;
</script>