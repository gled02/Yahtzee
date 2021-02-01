<?php
  session_start();

  if(isset($_SESSION['count'])) {
    $_SESSION['count'] = $_SESSION['count'] - 1;
  } else {
    $_SESSION['count'] = 3;
  }

  function nbocc($tab, $n, $x) {
    $compt = 0;
    for($i = 0;$i < $n; ++$i) {
      if($tab[$i] == $x) {
        $compt = $compt + 1;
      }
    }
    return $compt;
  }

  function sum($tab, $n) {
    $sum = 0;
    for ($j = 0; $j < $n; ++$j) {
      $sum = $sum + $tab[$j];
    }
    return $sum;
  }

  function suiteL($tab, $n) {
    sort($tab);
    for($j = 0; $j < $n; ++$j) {
      $temp = 0;
      if($tab[$j] == $tab[$j+1]) {
        $temp = $tab[$j];
        for($k = $j; $k < $n; ++$k) {
          $tab[$k] = $tab[$k+1];
        }
        $tab[4] = $temp;
      }
    }
    if((($tab[0] == 1) && ($tab[1] == 2) && ($tab[2] == 3) && ($tab[3] == 4)) ||
       (($tab[0] == 2) && ($tab[1] == 3) && ($tab[2] == 4) && ($tab[3] == 5)) ||
       (($tab[0] == 3) && ($tab[1] == 4) && ($tab[2] == 5) && ($tab[3] == 6)) ||
       (($tab[1] == 1) && ($tab[2] == 2) && ($tab[3] == 3) && ($tab[4] == 4)) ||
       (($tab[1] == 2) && ($tab[2] == 3) && ($tab[3] == 4) && ($tab[4] == 5)) ||
       (($tab[1] == 3) && ($tab[2] == 4) && ($tab[3] == 5) && ($tab[4] == 6))) {
        return 30;
    }
    return 0;
  }

  function suiteG($tab, $n) {
    sort($tab);
    $test = true;
    for($j = 0; $j < $n; ++$j) {
      if($tab[$j+1] != $tab[$j] + 1) {
        $test = false;
      }
    }
    if($test) {
     return 40;
    }
    return 0;
  }

  function full($tab, $n) {
    $tabocc = array();
    for ($j = 0; $j < $n; ++$j) {
      $tabocc[$j] = nbocc($tab, $n, $tab[$j]);
    }
    for ($j = 0; $j < $n; ++$j) {
      if($tabocc[$j] == 3) {
        for ($k = 0; $k < $n; ++$k) {
          if($tabocc[$k] == 2) {
            return true;
          }
        }
      }   
    }
    return false;
  }

  function CallDé() {
    $ifselected = array(isset($_POST["0"]), isset($_POST["1"]), isset($_POST["2"]), isset($_POST["3"]), isset($_POST["4"]));
    $setDe = array();
    $path = "Dés/";
    echo "<div id='deslabel'>";
    for($i = 0;$i < 5; ++$i) {
      if($ifselected[$i] == true) {
       $de = $_POST["de_$i"];
       $setDe[$i] = $de;
       echo "<label>
        <input type='hidden' name='de_{$i}' value='$de' class='des'/>
        <img src='{$path}{$de}.png' alt='Dé sélectionné' height='70' width='70' />
        <input type='checkbox' name='$i' value='' id='$i' checked />
        </label>";
      } else {
       $de = rand(1, 6);
       $setDe[$i] = $de;
       echo "<label>
        <input type='hidden' name='de_{$i}' value='$de' class='des'/>
        <img src='{$path}{$de}.png' alt='Dé aléatoire' height='70' width='70' />
        <input type='checkbox' name='$i' value='' id='$i'/>
        </label>";
      }
    }
    echo "</div>";
    return $setDe;
  }

  function Score() {
    $tabDe = CallDé();
    $tabpoints = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    for($i = 0; $i < 5; ++$i) {
      $k = nbocc($tabDe, 5, $tabDe[$i]);
      $j = $k * $tabDe[$i];
      if($tabDe[$i] == 1) {
        $tabpoints[0] = $j;
      }
      if($tabDe[$i] == 2) {
        $tabpoints[1] = $j;
      }
      if($tabDe[$i] == 3) {
        $tabpoints[2] = $j;
      }
      if($tabDe[$i] == 4) {
        $tabpoints[3] = $j;
      }
      if($tabDe[$i] == 5) {
        $tabpoints[4] = $j;
      }
      if($tabDe[$i] == 6) {
        $tabpoints[5] = $j;
      }
      if($k > 2) {
        $tabpoints[6] = sum($tabDe, 5);
      }
      if($k > 3) {
        $tabpoints[7] = sum($tabDe, 5);
      }
      if(full($tabDe, 5)) {
        $tabpoints[8] = 25;
      }
      $tabpoints[9] = suiteL($tabDe, 4);
      $tabpoints[10] = suiteG($tabDe, 4);
      if($k == 5) {
        $tabpoints[11] = 50;
      }
      $tabpoints[12] = sum($tabDe, 5);
    }
    return $tabpoints;
  }

  function Change() {
    if(!isset( $_SESSION['tab'])) {
      $_SESSION['tab'] = array(false, false, false, false, false, false, false, false, false, false, false, false, false);
    } else {
      $isetbut = array(isset($_POST["As"]), isset($_POST["Deux"]), isset($_POST["Trois"]), isset($_POST["Quatre"]),
                       isset($_POST["Cinq"]), isset($_POST["Six"]), isset($_POST["Brelan"]), isset($_POST["Carre"]),
                       isset($_POST["Full"]), isset($_POST["Petite"]), isset($_POST["Grande"]), isset($_POST["Yahtzee"]),
                       isset($_POST["Chance"]));
      for($i = 0; $i < 13; ++$i) {
        if($isetbut[$i] == true && $_SESSION['tab'][$i] != true) {
          $_SESSION['tab'][$i] = true;
          $_SESSION['count'] = 3;
          echo "<script>document.getElementById('0').checked = false</script>";
          echo "<script>document.getElementById('1').checked = false</script>";
          echo "<script>document.getElementById('2').checked = false</script>";
          echo "<script>document.getElementById('3').checked = false</script>";
          echo "<script>document.getElementById('4').checked = false</script>";
          for($i = 0;$i < 5; ++$i) {
            $_POST[$i] = NULL;
          }
        }
      }
    }
    return $_SESSION['tab'];
  }

  function Sum_Point($point, $start, $end) {
    $acc = 0;
    for($i = $start; $i <= $end; ++$i) {
      $acc = $acc + $point[$i];
    }
    return $acc;
  }

?>
