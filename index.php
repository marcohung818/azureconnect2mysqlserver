
<?php 
    
  $host = 'ap-cloud-quiz-mysql.mysql.database.azure.com';
  $username = 'azuresqladmin@ap-cloud-quiz-mysql';
  $password = '#Marco121521';
  $db_name = 'ap-cloud-quiz-mysqldb';

  //Initializes MySQLi
  $conn = mysqli_init();

  mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);

  // Establish the connection
  mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

  //If connection failed, show the error
  if (mysqli_connect_errno())
  {
      die('Failed to connect to MySQL: '.mysqli_connect_error());
  }
?> 
