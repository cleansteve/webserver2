
  <div>
    <h2>XE Rates</h2>
    <p>
      <?php
            //variables to hold the amount of foreign currency:  
            $KHR = 2103942;
            $MMK = 19092;
            $NOK = 109;
            $ALL = 9094;

          echo "Starting amounts:<br><br>KHR = " . $KHR . "<br>MMK = " . $MMK . "<br>NOK = " . $NOK . "<br>ALL = " . $ALL;

          //Starting Amount (Original Currency) / Ending Amount (New Currency) = Exchange Rate. I.e. nUSD / USD = XE
            $KHRx = 0.00024497871;
            $MMKx = 0.00053994069;
            $NOKx = 0.10571662;
            $ALLx = 0.0088458063;

          //formatting for clarity
          echo "<br><br>";

          //Starting Amount (Original Currency) * Exchange Rate = Ending Amount (USD)
          echo "Converted to USD:<br><br>HRx = " . $KHR * $KHRx . "<br>MMKx = " . $MMK * $MMKx . "<br>NOKx = " . $NOK * $NOKx . "<br>ALLx = " . $ALL * $ALLx;
          //formatting for clarity
          echo "<br><br>Total in USD minus fees:<br>==================<br><br>";

          echo "$".round(($KHR * $KHRx - 1) + ($MMK * $MMKx - 1) + ($NOK * $NOKx - 1) + ($ALL * $ALLx - 1),2,PHP_ROUND_HALF_DOWN). "<br><br>";


          //Probier mal bitte eine PHP datei zu inkludiere?
          echo "Dennis is a little tiny baby and he wants his mommy. He's still uglier than Nick Kruschke.<br>";
          echo "include test: ";

          include 'include_test.php';
        ?>
    </p>
    
  </div>