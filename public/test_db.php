<?php
echo $_SERVER['SERVER_NAME'];

// connect to the server
$conn = new mysqli('localhost','kojpvj_cars','rw756(+%B)=R','kojpvj_aptio');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$sql = "select * from users";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row from $result
  while($row = $result->fetch_assoc()) {
    echo '<br /> id: '. $row['user_id'];
  }
}
else {
  echo '0 results';
}

$conn->close();



?>