<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head> 
<title>Funda</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
  <link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>

<div id="logo">
  <img src="img/funda-logo-hp.gif" id="toplogo" alt="toplogo"/>
</div>

<?php
include ("/includes/db_connection.php");

    if(isset($_POST["query"]) && $_POST["query"] != "") {
      $query = $_POST["query"]; 
    } else {
      $query = "SELECT wo.Address, wo.Vraagprijs, wo.PC, wo.City, wo.WoonOppervlakte, wo.AantalKamers, mkantoor.Name, soortvraagprijs.Name AS s_name,
                        soortobject.Name AS o_name 
                FROM wo
                INNER JOIN mkantoor
                ON wo.MKID = mkantoor.MKID
                INNER JOIN soortbouw
                ON wo.SoortBouw = soortbouw.ID
                INNER JOIN soortvraagprijs
                ON wo.Vraagprijssoort = soortvraagprijs.ID
                INNER JOIN soortobject
                ON wo.SoortObject = soortobject.ID
                WHERE 1";
    }

    if(isset($_POST["woning"]) && $_POST["woning"] != "") {
      if ($_POST["woning"] == "bestaand") {
        $woning = "Bestaande bouw";
      } elseif ($_POST["woning"] == "nieuwbouw") {
        $woning = "Nieuwbouw";
      }
      $query .= " AND soortbouw.Name = '$woning'";
    }
    if(isset($_POST["straatnaam"]) && $_POST["straatnaam"] != "") {
      $straatnaam = $_POST["straatnaam"];
      $query .= " AND wo.Address LIKE '{$straatnaam}%'";
    }
    if(isset($_POST["huisnummer"]) && $_POST["huisnummer"] != "") {
      $huisnummer = $_POST["huisnummer"];
      $query .= " AND wo.Address LIKE '%{$huisnummer}%'";
    }
    if(isset($_POST["toevoeging"]) && $_POST["toevoeging"] != "") {
      $toevoeging = $_POST["toevoeging"];
      $query .= " AND wo.Address LIKE '%{$toevoeging}'";
    }
    if(isset($_POST["postcode"]) && $_POST["postcode"] != "") {
      $postcode = $_POST["postcode"];
      $query .= " AND wo.PC = '$postcode'";
    }
    if(isset($_POST["plaatsnaam"]) && $_POST["plaatsnaam"] != "") {
      $plaatsnaam = $_POST["plaatsnaam"];
      $query .= " AND wo.City = '$plaatsnaam'";
    }

    print_r($query);
    $result=mysqli_query($conn,$query);
?>

<div id="balk">
  <ul>
    <li class="active">Woningaanbod</li>
    <li>Verkoop</li>
    <li>NVM Makelaars</li>
    <li>Gids</li>
    <li>Verhuizen</li>
    <li>My Funda</li>
  </ul>
</div>

<div id="nav">
  <ul>
    <li><a href="index.html" class="active">Koopwoningen</a></li>
    <li>Huurwoningen</li>
    <li>Nieuwbouwprojecten</li>
    <li>Recreatiewoningen</li>
    <li>Europa</li>
  </ul>
</div>

<div id="txt">

<? mysqli_data_seek($result, 0); ?>
  <?php echo mysqli_num_rows($result); ?> koopwoning(en) gevonden
</div>

<div id="main">

<table>
  <tr>
    <form action="overzicht.php" method="post" id="specify">
      <input type="hidden" name="query" id="query" value="<?php echo $query ?>" />
      <td id="data" valign="top">
        <div class="head">Prijsklasse</div><br/>
        Van:
        <select>
                  <option selected value="0">€ 0</option>
                  <option  value="50000">€ 50.000</option>
                  <option  value="75000">€ 75.000</option>
                  <option  value="100000">€ 100.000</option>
                  <option  value="125000">€ 125.000</option>
                  <option  value="150000">€ 150.000</option>
                  <option  value="175000">€ 175.000</option>
                  <option  value="200000">€ 200.000</option>
                  <option  value="225000">€ 225.000</option>
                  <option  value="250000">€ 250.000</option>
                  <option  value="275000">€ 275.000</option>
                  <option  value="300000">€ 300.000</option>
                  <option  value="325000">€ 325.000</option>
                  <option  value="350000">€ 350.000</option>
                  <option  value="375000">€ 375.000</option>
                  <option  value="400000">€ 400.000</option>
                  <option  value="450000">€ 450.000</option>
                  <option  value="500000">€ 500.000</option>
                  <option  value="550000">€ 550.000</option>
                  <option  value="600000">€ 600.000</option>
                  <option  value="650000">€ 650.000</option>
                  <option  value="700000">€ 700.000</option>
                  <option  value="750000">€ 750.000</option>
                  <option  value="800000">€ 800.000</option>
                  <option  value="900000">€ 900.000</option>
                  <option  value="1000000">€ 1.000.000</option>
                  <option  value="1250000">€ 1.250.000</option>
                  <option  value="1500000">€ 1.500.000</option>
                  <option  value="2000000">€ 2.000.000</option>
          </select>
          <br/>
          <br/>
          Tot:
          <select>
                  <option  value="50000">€ 50.000</option>
                  <option  value="75000">€ 75.000</option>
                  <option  value="100000">€ 100.000</option>
                  <option  value="125000">€ 125.000</option>
                  <option  value="150000">€ 150.000</option>
                  <option  value="175000">€ 175.000</option>
                  <option  value="200000">€ 200.000</option>
                  <option  value="225000">€ 225.000</option>
                  <option  value="250000">€ 250.000</option>
                  <option  value="275000">€ 275.000</option>
                  <option  value="300000">€ 300.000</option>
                  <option  value="325000">€ 325.000</option>
                  <option  value="350000">€ 350.000</option>
                  <option  value="375000">€ 375.000</option>
                  <option  value="400000">€ 400.000</option>
                  <option  value="450000">€ 450.000</option>
                  <option  value="500000">€ 500.000</option>
                  <option  value="550000">€ 550.000</option>
                  <option  value="600000">€ 600.000</option>
                  <option  value="650000">€ 650.000</option>
                  <option  value="700000">€ 700.000</option>
                  <option  value="750000">€ 750.000</option>
                  <option  value="800000">€ 800.000</option>
                  <option  value="900000">€ 900.000</option>
                  <option  value="1000000">€ 1.000.000</option>
                  <option  value="1250000">€ 1.250.000</option>
                  <option  value="1500000">€ 1.500.000</option>
                  <option  value="2000000">€ 2.000.000</option>
                  <option selected value="ignore_filter">Geen maximum</option>
          </select>
          <br/>

        <div class="head">Soort object</div>
        <div class="content">
          <?php 
          $query = "SELECT * FROM soortobject";
          $result3=mysqli_query($conn,$query);
          if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()) {
              echo "<input type='radio' name='object' value=".$row["Name"]." id=".$row["Name"]."/><label for=".$row["Name"].">".$row["Name"]."</label><br/>";
            }
          }
          ?>
        </div>

        <div class="head">Soort bouw</div>
        <div class="content">
          <input type="radio" name="woning" value="bestaand" id="bestaand" onclick="document.getElementById('specify').submit();" <?php echo ($woning=='Bestaande bouw')?'checked':'' ?>/><label for="bestaand">Bestaande bouw</label><br/>
          <input type="radio" name="woning" value="nieuwbouw" id="nieuwbouw" onclick="document.getElementById('specify').submit();" <?php echo ($woning=='Nieuwbouw')?'checked':'' ?>/><label for="nieuwbouw">Nieuwbouw</label>
        </div>

        <div class="head">Aantal kamers</div>
        <div class="content">
          <?php
          $kamers = array();
          while($row = $result->fetch_assoc()) {
            $kamers[] = $row["AantalKamers"];
          }
          $tmp = array_unique($kamers);
          sort($tmp);
          foreach ($tmp as $value) {
            echo "<input type='radio' name='kamer' value=".$value." id=".$value."/><label for=".$value.">".$value."+</label><br/>";
          }
          ?>
        </div>

        <div class="head">Woonoppervlakte</div>
        <div class="content">
          <input type='radio' name='opp' value="50" id="50"/><label for="50">50+ m<sup>2</sup></label><br/>
          <input type='radio' name='opp' value="75" id="75"/><label for="75">75+ m<sup>2</sup></label><br/>
          <input type='radio' name='opp' value="100" id="100"/><label for="100">100+ m<sup>2</sup></label><br/>
          <input type='radio' name='opp' value="150" id="150"/><label for="150">150+ m<sup>2</sup></label><br/>
          <input type='radio' name='opp' value="250" id="250"/><label for="250">250+ m<sup>2</sup></label><br/>
        </div>
      </td>
    </form>
    

    <td valign="top">
    <?php
    mysqli_data_seek($result, 0);
    if ($result->num_rows > 0) {
      while($rw = $result->fetch_assoc()) {
        echo "<div class='huisdata'>";
        echo "<div class='head'><a class='normal' href='detail.html'>".$rw["Address"]."</a></div><div class='prijs'>€ ".$rw["Vraagprijs"]." ".$rw["s_name"]."</div><br/>";
        echo "<span class='adres'>".$rw["PC"]." ".$rw["City"]."<br/>".$rw["WoonOppervlakte"]." m<sup>2</sup> - ".$rw["AantalKamers"]." kamers</span><br/>";
        echo "<span><a class='makelaar' href='makelaar.html'>".$rw["Name"]."</a></span>";
        echo "</div>";
     }
    } else {
      echo "Geen woningen gevonden";
    }
    ?>
    </td>
  </tr>
</table>

</div>



</body></html>


         

      


