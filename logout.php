<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <script src="Resources/bootstrap/js/bootstrap.min.js"> </script>

    <title>Loging out</title>
    <style type="text/css">
        .lds-ripple {
        display: inline-block;
        position: relative;
        width: 100px;
        height: 100px;
      }
      .lds-ripple div {
        position: absolute;
        border: 10px solid #17a2b8;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 2s cubic-bezier(0, 0.4, 0.8, 1) infinite;
      }
      .lds-ripple div:nth-child(2) {
        animation-delay: -1s;
      }
      @keyframes lds-ripple {
        0% {
          top: 100px;
          left: 100px;
          width: 0;
          height: 0;
          opacity: 1;
        }
        100% {
          top: 0px;
          left: 0px;
          width: 200px;
          height: 200px;
          opacity: 0;
        }
      }
    </style>
</head>

<body>
<div style="display: flex;
    justify-content: center;">
    
    <meta http-equiv="refresh" content="3; url = index.php" />
    <div style="position:absolute; left:46%; top:40%;">
            <div class="lds-ripple"><div></div><div></div></div>
    </div>
</body>

</html>