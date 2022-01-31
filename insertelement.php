<?php 
    
  $host = 'ap-cloud-quiz-mysql.mysql.database.azure.com';
  $username = 'azuresqladmin@ap-cloud-quiz-mysql';
  $password = '#Marco121521';
  $db_name = 'ap-cloud-quiz-mysqldb';

  //Initializes MySQLi
  $conn = mysqli_init();

  //mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);

  // Establish the connection
  mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

  //If connection failed, show the error
  if (mysqli_connect_errno())
  {
      die('Failed to connect to MySQL: '.mysqli_connect_error());
      mysqli_close();
  }

  else{
    echo "Connect Success!\n";
  }

//Create an Insert prepared statement and run it
$product_name = 'BrandNewProduct';
$product_color = 'Blue';
$product_price = 15.5;
if ($stmt = mysqli_prepare($conn, "INSERT INTO Products (ProductName, Color, Price) VALUES (?, ?, ?)"))
{
    mysqli_stmt_bind_param($stmt, 'ssd', $product_name, $product_color, $product_price);
    mysqli_stmt_execute($stmt);
    printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
    mysqli_stmt_close($stmt);
}
?> 