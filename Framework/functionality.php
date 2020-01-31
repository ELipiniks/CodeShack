<?php
session_start();

function maize ()
{
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if(isset($_POST['description']))
    {
      $array['maize']=array();
      $data = explode(" ", $_POST['description']);
      $result=null;
      foreach ($data as $key)
      {
        $RandomNumber=rand ( 1, 5 );
        switch ($RandomNumber)
            {
            case 1:
                $payload=str_replace(","," maize ",$key);
                break;
                case 2:
                $payload=str_replace(","," akmens ",$key);
                break;
                case 3:
                $payload=str_replace(","," egle ",$key);
                break;
                case 4:
                $payload=str_replace(","," cukuriņš ",$key);
                break;
                case 5:
                $payload=str_replace(","," puķīte ",$key);
                break;
                default:
                echo "UNEXPECTED ERROR";
            }
        $array['maize'][]=$payload;
      }
      foreach ($array['maize']as $value)
      {
        $result=$result.' '.$value;
      }
      $_SESSION['description'][]=  $result;
    }



  if ($conn->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  // Izveidoju tabulu
  $sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
  )";

  if(isset($_SESSION['description']))
  {
    foreach ($_SESSION['description'] as $value)
    {
      echo "<div class='list-item'>$value  </div> ";
      if($value==" ")
      {
        echo 'No value was given';  //jaizdomā, ka lai refreshojot lapu nepadodas tuksas vertibas uz sql datubazi
      }
    }

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('$value', 'Tho', 'john@example.com')";

    if ($conn->query($sql) === TRUE)
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  $conn->close();
}
?>
