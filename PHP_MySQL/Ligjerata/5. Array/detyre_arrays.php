<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHP Arrays - 5 Detyra me Zgjidhje</title>
  <style>
    body{font-family: Arial, sans-serif; line-height:1.6; padding:20px; max-width:1100px; margin:auto;}
    .task{border:1px solid #ddd; padding:16px; border-radius:12px; margin:18px 0;}
    code{background:#f6f6f6; padding:2px 6px; border-radius:6px;}
    pre{background:#f6f6f6; padding:12px; border-radius:12px; overflow:auto;}
    h1{font-size:22px; margin:0 0 10px 0;}
    h2{margin-top:0;}
    .hint{color:#555;}
    .solution{margin-top:12px; padding-top:12px; border-top:1px dashed #ccc;}
  </style>
</head>
<body>

  <h2>PHP Arrays - 5 Detyra (me Zgjidhje)</h2>
  <p class="hint">
    Nxënësit: Lexoni detyrën te titulli <code>&lt;h1&gt;</code> dhe pastaj shikoni zgjidhjen poshtë.
  </p>

  <!-- ======================= DETYRA 1 ======================= -->
  <div class="task">
    <h1>Detyra 1: Indexed Array + count()</h1>
    <p>
      Krijo një array <b>indexed</b> me 5 emra qytetesh. Pastaj:
      <br>1) Shfaq qytetin e parë dhe të fundit me index.
      <br>2) Shfaq sa elemente ka array duke përdorur <code>count()</code>.
    </p>

    <div class="solution">
      <h3>Zgjidhja:</h3>
      <?php
        $qytetet = array("Prizren", "Prishtine", "Gjakove", "Peje", "Ferizaj");

        echo "Qyteti i pare: " . $qytetet[0] . "<br>";
        echo "Qyteti i fundit: " . $qytetet[count($qytetet)-1] . "<br>";
        echo "Numri i elementeve: " . count($qytetet) . "<br>";
      ?>
    </div>
  </div>

  <!-- ======================= DETYRA 2 ======================= -->
  <div class="task">
    <h1>Detyra 2: Associative Array + foreach</h1>
    <p>
      Krijo një <b>associative array</b> ku çelësi është emri i nxënësit dhe vlera është nota (1-5).
      Pastaj shfaq të gjitha vlerat me <code>foreach</code> në formatin:
      <br><b>Emri - Nota</b>
    </p>

    <div class="solution">
      <h3>Zgjidhja:</h3>
      <?php
        $notat = array(
          "Olti" => 5,
          "Ardit" => 4,
          "Sara" => 5,
          "Elona" => 3
        );

        foreach($notat as $emri => $nota){
          echo $emri . " - " . $nota . "<br>";
        }
      ?>
    </div>
  </div>

  <!-- ======================= DETYRA 3 ======================= -->
  <div class="task">
    <h1>Detyra 3: sort() dhe rsort()</h1>
    <p>
      Krijo një array me 8 numra të ndryshëm. Pastaj:
      <br>1) Renditi numrat nga më i vogli te më i madhi me <code>sort()</code> dhe shfaq rezultatin.
      <br>2) Renditi numrat nga më i madhi te më i vogli me <code>rsort()</code> dhe shfaq rezultatin.
    </p>

    <div class="solution">
      <h3>Zgjidhja:</h3>
      <?php
        $numrat = array(12, 5, 33, 1, 9, 22, 7, 18);

        sort($numrat);
        echo "<b>sort():</b> ";
        print_r($numrat);
        echo "<br>";

        rsort($numrat);
        echo "<b>rsort():</b> ";
        print_r($numrat);
        echo "<br>";
      ?>
    </div>
  </div>

  <!-- ======================= DETYRA 4 ======================= -->
  <div class="task">
    <h1>Detyra 4: asort() dhe ksort()</h1>
    <p>
      Krijo një associative array ku çelësi është emri i produktit dhe vlera është çmimi.
      Pastaj:
      <br>1) Renditi sipas vlerës (çmimit) me <code>asort()</code>.
      <br>2) Renditi sipas çelësit (emrit) me <code>ksort()</code>.
    </p>

    <div class="solution">
      <h3>Zgjidhja:</h3>
      <?php
        $produkte = array(
          "Laptop" => 650,
          "Mouse" => 15,
          "Monitor" => 120,
          "Keyboard" => 25
        );

        echo "<b>asort() (sipas cmimit):</b><br>";
        asort($produkte);
        foreach($produkte as $p => $cmimi){
          echo $p . " - " . $cmimi . "€<br>";
        }

        echo "<br><b>ksort() (sipas emrit):</b><br>";
        ksort($produkte);
        foreach($produkte as $p => $cmimi){
          echo $p . " - " . $cmimi . "€<br>";
        }
      ?>
    </div>
  </div>

  <!-- ======================= DETYRA 5 ======================= -->
  <div class="task">
    <h1>Detyra 5: push/pop/shift/unshift + splice()</h1>
    <p>
      Krijo një array me 4 fruta. Pastaj bëj këto veprime:
      <br>1) Shto një frut në fund me <code>array_push()</code>.
      <br>2) Largo një frut nga fundi me <code>array_pop()</code>.
      <br>3) Largo një frut nga fillimi me <code>array_shift()</code>.
      <br>4) Shto një frut në fillim me <code>array_unshift()</code>.
      <br>5) Zëvendëso elementin e dytë me një frut tjetër duke përdorur <code>array_splice()</code>.
      <br><b>Shfaq array pas çdo veprimi.</b>
    </p>

    <div class="solution">
      <h3>Zgjidhja:</h3>
      <?php
        $frutat = array("Molle", "Banane", "Portokall", "Kivi");
        echo "<b>Fillimi:</b> ";
        print_r($frutat);
        echo "<br><br>";

        array_push($frutat, "Dardhe");
        echo "<b>Pas push(Dardhe):</b> ";
        print_r($frutat);
        echo "<br><br>";

        array_pop($frutat);
        echo "<b>Pas pop():</b> ";
        print_r($frutat);
        echo "<br><br>";

        array_shift($frutat);
        echo "<b>Pas shift():</b> ";
        print_r($frutat);
        echo "<br><br>";

        array_unshift($frutat, "Rrush");
        echo "<b>Pas unshift(Rrush):</b> ";
        print_r($frutat);
        echo "<br><br>";

        array_splice($frutat, 1, 1, "Luleshtrydhe");
        echo "<b>Pas splice(index 1 -> Luleshtrydhe):</b> ";
        print_r($frutat);
        echo "<br>";
      ?>
    </div>
  </div>

</body>
</html>

