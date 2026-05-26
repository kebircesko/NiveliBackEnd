<?php
$cookie_name = "emri_perdoruesit";

// Kontrollojmë nëse përdoruesi ka klikuar butonin për të fshirë cookie
if(isset($_POST['fshij_cookie'])) {
    // Fshirja bëhet duke vendosur kohë skadimi në të kaluarën
    setcookie($cookie_name, "", time() - 3600, "/");
    $mesazh = "Cookie u fshi. Rifreskoni faqen për të krijuar një të re.";
} else {
    // Nëse cookie nuk ekziston, e krijojmë
    if(!isset($_COOKIE[$cookie_name])) {
        $vlera = "Kebir"; // Shembull – mund të jetë emri i përdoruesit
        setcookie($cookie_name, $vlera, time() + (86400 * 1), "/"); // 1 ditë afati i skadimit
        $mesazh = "Përshëndetje për herë të parë, $vlera! Cookie u krijua.";
    } else {
        // Nëse cookie ekziston, e marrim vlerën e saj
        $vlera = $_COOKIE[$cookie_name];
        $mesazh = "Mirësevini përsëri, $vlera! Ju jeni rikthyer në faqe.";
    }
}
?>
<html>
<head>
    <title>Shembull me Cookie në PHP</title>
</head>
<body style="font-family: Arial; text-align:center; margin-top:50px;">
    <h2><?php echo $mesazh; ?></h2>
    <p>Ky shembull tregon se si ruhet një emër përdoruesi në cookie për 1 ditë.</p>
    <p><b>Shpjegim:</b> Kur e rifreskoni faqen, cookie e ruajtur rikthehet dhe faqja ju njeh sërish.</p>

    <!-- Form për fshirjen e cookie -->
    <form method="post">
        <button type="submit" name="fshij_cookie" style="padding:10px 20px; font-size:16px; cursor:pointer;">
            Fshij Cookie
        </button>
    </form>
</body>
</html>