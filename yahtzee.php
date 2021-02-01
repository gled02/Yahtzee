<?php
  include "fonctions.php";
?>
<!DOCTYPE html>
<html lang="fr">

  <head>
    <title>Yahtzee</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" /> 
  </head>

  <body>
   <img id="logo" src="Images/yahtzeeLogo.png" alt="Yahtzee Logo"/>
   <div id="start_button">
    <button onclick="window.open('dest_session.php')">Nouvelle partie</button>
    <button onclick="window.open('http://openyahtzee.org/')">Règles</button>
    <button onclick="window.open('about.html')">Information</button>
   </div>
   <form method="post" name="Points">
    <table>
      <caption>Feuille de score</caption>
      <thead>
        <tr>
          <th>Section Haute</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="td0" class="button"><input type="submit" value="As" name="As" id="As" /></td>
          <td id="t0" class="text"><input type="text" value="" name="Score1" size="5" id="one" disabled /></td>
        </tr>
        <tr>
          <td id="td1" class="button"><input type="submit" value="Deux" name="Deux" id="Deux" /></td>
          <td id="t1" class="text"><input type="text" value="" name="Score2" size="5" id="two" disabled /></td>
        </tr>
        <tr>
          <td id="td2" class="button"><input type="submit" value="Trois" name="Trois" id="Trois" /></td>
          <td id="t2" class="text"><input type="text" value="" name="Score3" size="5" id="three" disabled /></td>
        </tr>
        <tr>
          <td id="td3" class="button"><input type="submit" value="Quatre" name="Quatre" id="Quatre" /></td>
          <td id="t3" class="text"><input type="text" value="" name="Score4" size="5" id="four" disabled /></td>
        </tr>
        <tr>
          <td id="td4" class="button"><input type="submit" value="Cinq" name="Cinq" id="Cinq" /></td>
          <td id="t4" class="text"><input type="text" value="" name="Score5" size="5" id="five" disabled /></td>
        </tr>
        <tr>
          <td id="td5" class="button"><input type="submit" value="Six" name="Six" id="Six" /></td>
          <td id="t5" class="text"><input type="text" value="" name="Score6" size="5" id="six" disabled /></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>Total section haute</td>
          <td><input type="text" value="" id = "TotalHScore" name="TotalHScore" size="5" disabled /></td>
        </tr>
      </tfoot>
    </table>

    <table>
      <thead>
        <tr>
          <th>Section Basse</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="td6" class="button"><input type="submit" value="Brelan" name="Brelan" id="Brelan" /></td>
          <td id="t6" class="text"><input type="text" value="" name="ScoreB" size="5" id="brelan" disabled /></td>
        </tr>
        <tr>
          <td id="td7" class="button"><input type="submit" value="Carré" name="Carre" id="Carre" /></td>
          <td id="t7" class="text"><input type="text" value="" name="ScoreCa" size="5" id="square" disabled /></td>
        </tr>
        <tr>
          <td id="td8" class="button"><input type="submit" value="Full" name="Full" id="Full" /></td>
          <td id="t8" class="text"><input type="text" value="" name="ScoreF" size="5" id="full" disabled /></td>
        </tr>
        <tr>
          <td id="td9" class="button"><input type="submit" value="Petite Suite" name="Petite" id="Petite" /></td>
          <td id="t9" class="text"><input type="text" value="" name="ScoreP" size="5" id="little" disabled /></td>
        </tr>
        <tr>
          <td id="td10" class="button"><input type="submit" value="Grande Suite" name="Grande" id="Grande" /></td>
          <td id="t10" class="text"><input type="text" value="" name="ScoreG" size="5" id="great" disabled /></td>
        </tr>
        <tr>
          <td id="td11" class="button"><input type="submit" value="Yahtzee" name="Yahtzee" id="Yahtzee" /></td>
          <td id="t11" class="text"><input type="text" value="" name="ScoreY" size="5" id="yahtzee" disabled /></td>
        </tr>
        <tr>
          <td id="td12" class="button"><input type="submit" value="Chance" name="Chance" id="Chance" /></td>
          <td id="t12" class="text"><input type="text" value="" name="ScoreCh" size="5" id="luck" disabled /></td>
        </tr>
      </tbody>
       <tfoot>
        <tr>
          <td>Total section basse</td>
          <td><input type="text" value="" id = "TotalLScore" name="TotalLScore" size="5" disabled /></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><input type="text" value="" name="Total" id="Total" size="5" disabled /></td>
        </tr>
      </tfoot>
    </table>
    <div id="text">
      <p>
        Comment jouer? 
      </p>
      <p>
        Comment faire une partie de Yahtzee?
      </p>
      <p>
        Le Yahtzee se joue avec 5 dés et se finit une fois toutes les cases de la feuille de score remplies. 
        Vous disposez de 3 lancers à chaque coup. L’objectif étant de réaliser des combinaisons qui rapportent des points.
      </p>
      <p>
        Vous pouvez choisir de garder la combinaison obtenue ou, de relancer tout ou une partie des dés. 
        Si vous souhaitez relancer seulement certains dés, vous pouvez sélectionner ceux que vous voulez garder, en cochant les cases correspondantes.
      </p>
      <p>
        Pour remplir une case de la feuille de score, a chaque tour, vous devez cliquer sur le bouton associé. Si vous souhaitez
        savoir combien de points il marquera en choisissant cette case, vous devez passer le curseur de la souris sur cette case.
      </p>
    </div>
    <?php
      $tabButton = Change();
      function save_points($tabButton) {
        $points = Score();
        $tabIdButton = array("As", "Deux", "Trois", "Quatre", "Cinq", "Six", "Brelan", "Carre", "Full", "Petite", "Grande", "Yahtzee", "Chance");
        $tabIdText = array("one", "two", "three", "four", "five", "six", "brelan", "square", "full", "little", "great", "yahtzee", "luck");
        if(!isset($_SESSION['storage'])) {
          $_SESSION['storage'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        }
        for($i = 0; $i < 13; ++$i) {
          if($tabButton[$i] == true) {
            $k = $tabIdButton[$i];
            echo "<script>document.getElementById('$k').disabled = true</script>";
            $string = "td".$i;
            $string1 = "t".$i;
            echo "<script>document.getElementById('$string').removeAttribute('class')</script>";
            echo "<script>document.getElementById('$string1').removeAttribute('class')</script>";
            if(!isset($_SESSION['points'])) {
              $_SESSION['points'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            }
            $_SESSION['storage'][$i] = $_SESSION['points'][$i];
            goto prints;
            $_SESSION['points'][$i] = -1;
          } else {
            $_SESSION['points'][$i] = $points[$i];
          }
          if($_SESSION['points'][$i] != -1) {
            $j = $_SESSION['points'][$i];
            $p = $tabIdText[$i];
            echo "<script>document.getElementById('$p').value = $j </script>";
          } else {
           prints :
            $p = $tabIdText[$i];
            $j = $_SESSION['storage'][$i];
            echo "<script>document.getElementById('$p').value = $j </script>";
          }
        }
        return $_SESSION['storage'];
      }
      $chosenpoints = save_points($tabButton);
      $pointh = Sum_Point($chosenpoints, 0, 5);
      $pointb = Sum_Point($chosenpoints, 6, 12);
      echo "<script>document.getElementById('TotalHScore').value = $pointh </script>";
      echo "<script>document.getElementById('TotalLScore').value = $pointb </script>";
      echo "<script>document.getElementById('Total').value = $pointh + $pointb </script>";
      $final = nbocc($tabButton,13,true);
      if($_SESSION['count'] == 0 || $final == 13) {
        echo "<div id='lancer'><input type='submit' value='Lancer' name='Lancer' id='Lancer' disabled/>";
        if($_SESSION['count'] == 0) {
          echo "Choisissez les points à garder</div>";
          $_SESSION['count'] = 4;
        }
        if($final == 13) {
          $total = $pointh + $pointb ;
          echo "Vous avez gagné $total points</div>";
        }
      } else {
        $k = $_SESSION['count'];
        echo "<div id='lancer'><input type='submit' value='Lancer' name='Lancer' id='Lancer'/>
        Vous avez droit à $k jets</div>";
      }
    ?>
   </form>
  </body>
</html>
