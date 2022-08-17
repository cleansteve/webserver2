<h1>Programming Journal</h1>
<?php
      include '../src/db_connection.php';

      $sql = "SELECT id, title, authors, published_date, topic, content FROM test.articles LIMIT 50;";
      $result = $conn->query($sql);
      
      if ($result->rowCount() > 0) {
          // output data of each row
          /*
          var_dump($result->fetch(PDO::FETCH_ASSOC));
          var_dump($result->fetch(PDO::FETCH_ASSOC));
          var_dump($result->fetch(PDO::FETCH_ASSOC));
          var_dump($result->fetch(PDO::FETCH_ASSOC));
          die();
          */
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo "<br><br><strong>id: " . $row["id"] . " - Title: " . $row["title"] . "</strong> by " . $row["authors"] . "<br>Published on: " . $row["published_date"] . "<br><br>" . $row["content"] . "<br>";
          }
      } else {
          echo "0 results";
      }
      
      $conn = null;

    ?>