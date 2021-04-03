<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
function getdetails(){
    var year = $('#year').val();
    $.ajax({
        type: "POST",
        url: "DB_moves.php",
        data: {fyear:year}
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}
</script>
</head>
<body>
               <input type="text" name="year" id="year" />
               <input type="submit" name="submit" id="submit" value="submit" onClick = "getdetails()" />
    <div id="msg"></div>
</body>
</html>