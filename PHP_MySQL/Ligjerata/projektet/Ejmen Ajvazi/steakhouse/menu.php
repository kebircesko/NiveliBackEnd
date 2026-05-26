<?php
require_once 'database.php';

$stmt = $pdo->query("SELECT * FROM menu_items ORDER BY category, name");
$items = $stmt->fetchAll();

$steaks = array_filter($items, function($item) { return $item['category'] == 'steaks'; });
$salads = array_filter($items, function($item) { return $item['category'] == 'salads'; });
$desserts = array_filter($items, function($item) { return $item['category'] == 'desserts'; });
$drinks = array_filter($items, function($item) { return $item['category'] == 'drinks'; });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA Steakhouse - Menu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
<script>
    $(document).ready(function(){
    $("#as p").hide();
    $("#close").hide();
    $("#hamburger").click(function(){
        $("#canvas").fadeIn().delay(200);
        $("#as p").slideDown();
        $("#hamburger").hide();
        $("#close").show();
    });
    $("#close").click(function(){
        $("#canvas").fadeOut().delay(200);
        $("#as p").slideUp();
        $("#hamburger").show();
        $("#close").hide();
    });

    $(".navclick").click(function(){
        $("#canvas").fadeOut().delay(200);
        $("#as p").slideUp();
        $("#hamburger").show();
        $("#close").hide();
    });
});
</script>

<div id="navpc">
    <img src="./images/logo.png" id="logopc" alt=""/>
    <ul>
        <a href="index.php"><li>Home</li></a>
        <a href="menu.php"><li>Menu</li></a>
        <a href="about.html"><li>About</li></a>
        <a href="contact.php"><li id="last">Contact</li></a>
        <a href="book.html"><button class="primary">Book a table</button></a>
    </ul>
</div>

<div id="navmobile">
    <img src="./images/logo.png" id="logomob" alt="" />
    <ion-icon name="menu" id="hamburger"></ion-icon>
</div>

<div id="canvas">
    <div id="headercanvas">
        <div id="navmobile">
            <img src="./images/logo.png" id="logomob" alt="" />
            <ion-icon name="close" id="close"></ion-icon>
        </div>
    </div>
    <div id="bodycanvas">
        <div id="as">
            <a class="navclick" href="index.php"><p>Home</p></a>
            <a class="navclick" href="menu.php"><p>Menu</p></a>
            <a class="navclick" href="about.html"><p>About</p></a>
            <a class="navclick" href="contact.php"><p>Contact</p></a>
            <a href="book.html"><button class="primary">Book a table</button></a>
        </div>
    </div>
</div>

<div class="track">
    <h1>Menu</h1>
    <img src="images/menu-icon.svg" alt="">
</div>

<br><br>

<script>
    $(document).ready(function() {
    $("#steaks").addClass("primary");
    $("#salads").addClass("secondary");
    $("#desserts").addClass("secondary");
    $("#drinks").addClass("secondary");
    $('.filter div').click(function() {
        $('.filter div').removeClass('primary').addClass('secondary');
        $(this).removeClass('secondary').addClass('primary');
    });

    $(".categorydiv").hide();
    $("#steakdiv").fadeIn();

    $("#steaks").click(function(){
        $(".categorydiv").hide();
        $("#steakdiv").fadeIn();
    });

    $("#salads").click(function(){
        $(".categorydiv").hide();
        $("#saladdiv").fadeIn();
    });

    $("#desserts").click(function(){
        $(".categorydiv").hide();
        $("#dessertdiv").fadeIn();
    });

    $("#drinks").click(function(){
        $(".categorydiv").hide();
        $("#drinkdiv").fadeIn();
    });
});
</script>

<div class="filter">
    <div id="steaks">STEAKS</div>
    <div id="salads">SALADS</div>
    <div id="desserts">DESSERTS</div>
    <div id="drinks">DRINKS</div>
</div>

<div id="steakdiv" class="categorydiv">
    <?php foreach($steaks as $item): ?>
    <div class="dish">
        <img src="<?php echo $item['image_url'] && file_exists($item['image_url']) ? $item['image_url'] : 'images/steak1.webp'; ?>" alt="">
        <div>
            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
            <p><?php echo htmlspecialchars($item['description']); ?></p>
            <h4>$<?php echo number_format($item['price'], 2); ?></h4>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div id="saladdiv" class="categorydiv">
    <?php foreach($salads as $item): ?>
    <div class="dish">
        <img src="<?php echo $item['image_url'] && file_exists($item['image_url']) ? $item['image_url'] : 'images/salad2.jpg'; ?>" alt="">
        <div>
            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
            <p><?php echo htmlspecialchars($item['description']); ?></p>
            <h4>$<?php echo number_format($item['price'], 2); ?></h4>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div id="dessertdiv" class="categorydiv">
    <?php foreach($desserts as $item): ?>
    <div class="dish">
        <img src="<?php echo $item['image_url'] && file_exists($item['image_url']) ? $item['image_url'] : 'images/dessert2.jpg'; ?>" alt="">
        <div>
            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
            <p><?php echo htmlspecialchars($item['description']); ?></p>
            <h4>$<?php echo number_format($item['price'], 2); ?></h4>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div id="drinkdiv" class="categorydiv">
    <?php foreach($drinks as $item): ?>
    <div class="dish">
        <img src="<?php echo $item['image_url'] && file_exists($item['image_url']) ? $item['image_url'] : 'images/drink2.jpg'; ?>" alt="">
        <div>
            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
            <h4>$<?php echo number_format($item['price'], 2); ?></h4>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    <div class='footerlogo'>
      <img src="images/logo.png" alt="">
    </div>
    <div class="sitemap">
      <h2>SITEMAP</h2>
      <div class="whiteline"></div>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="about.html">About</a>
      <a href="contact.php">Contact</a>
    </div>
    <div class="contactfooter">
    <h2>CONTACT</h2>
      <div class="whiteline"></div>
      <a href="tel: +38344124265">
        <ion-icon name="call"></ion-icon>
        <p>+383 44 444 444</p>
      </a>
  
      <a href="mailto: info@betones.com">
        <ion-icon name="mail"></ion-icon>
        <p>info@easteakhouse.com</p>
      </a>
  
      <a href="https://maps.app.goo.gl/q9DPzKMianUKCRaLA">
        <ion-icon name="location"></ion-icon>
        <p>Prizren, Kosovo</p>
      </a>
    </div>
  </footer>
  <section class="copyright">
    <p>&copy; EA STEAKHOUSE 2025</p>
  </section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>