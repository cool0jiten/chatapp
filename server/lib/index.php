<?php
session_start();
echo "This is my session Id:- ".$_SESSION["name"];
?>
<!doctype html>
<html>
  <head>
  <title>Basic Socket Chat Client</title>
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { font: 13px Helvetica, Arial; }
      form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
      form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
      form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
      #messages { list-style-type: none; margin: 0; padding: 0; }
      #messages li { padding: 5px 10px; }
      #messages li:nth-child(odd) { background: #eee; }
    </style>
  </head>
  <body>
    <ul id="messages"></ul>
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>

	<script src="jquery-1.10.2.min.js"></script>
	<script src="socket.js"></script>

    <script>
	  var socket=$.websocket('ws://127.0.0.1:2000');
	
      $('form').submit(function() {
        socket.emit('chat message', $('#m').val());
        $('#m').val('');
        return false;
      });
      socket.on('chat message', function(msg){
        $('#messages').append($('<li>').text(msg));
      });
      socket.on('connect', function(user){
        $('#messages').append($('<li>').text("Welcome:- "+user));
      });
	  
	  socket.listen();
    </script>
  </body>
</html>