
<?php 
  require_once "getkeyvault.php";  
  $host = 'ap-cloud-quiz-mysql.mysql.database.azure.com';
  $username = 'azuresqladmin@ap-cloud-quiz-mysql';
  $password = keyvault();
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

  // Run the create table query
if (mysqli_query($conn, 
'CREATE TABLE Products (`Id` INT NOT NULL AUTO_INCREMENT ,
`ProductName` VARCHAR(200) NOT NULL ,
`Color` VARCHAR(50) NOT NULL ,
`Price` DOUBLE NOT NULL ,
PRIMARY KEY (`Id`));')
){
printf("Table created\n");
}

?> 