<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Знакомство с PHP</title>
  </head>
  <body>
    <table border="1" rules="none">
      <?
        $operators=["+","-","*","/"];
        for($i=1; $i<100; $i++){
          echo "<tr>";
          for($j=1; $j<=5; $j++) {
            $operator=$operators[rand(0,3)];
            $num1=rand(1,20); $num2=rand(1,20);
            if ($operator=="-" and $num1-$num2<0 or $operator=="/" and $num1%$num2!=0 or 
                $operator=="*" and $num1*$num2>99 or $operator=="+" and $num1+$num2>99) {
              --$j;
              continue;
            }
            echo "<td align='right'>$num1$operator$num2=_____</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>
