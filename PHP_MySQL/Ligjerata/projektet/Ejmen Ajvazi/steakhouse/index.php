<?php
require_once 'database.php';

$stmt = $pdo->prepare("SELECT * FROM menu_items ORDER BY id DESC LIMIT 4");
$stmt->execute();
$top_picks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA Steakhouse</title>
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

<div class="hero">
    <h1 data-aos="fade-down" data-aos-duration="800">WELCOME</h1>
    <p>Experience luxury and comfort in our premium steakhouse</p>
    <br><br>
    <a href="menu.php"><button class="secondary">Menu</button></a>
</div>

<div class="toppicks">
    <h1>This <span class="yellow">week's</span> top picks</h1>
    <div class="categorydiv">
        <?php foreach($top_picks as $item): ?>
        <div class="dish" data-aos="fade-up">
            <img src="<?php echo $item['image_url'] ?: 'images/steak1.webp'; ?>" alt="">
            <div>
                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
                <h4>$<?php echo $item['price']; ?></h4>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="reviews-section" data-aos="fade-up">
    <h1>What Our <span class="yellow">Guests Say</span></h1>
    <div class="reviews-container">
      <div class="review-card">
        <p>"Absolutely the best steak I've had in years. The ambiance and service were top-notch!"</p>
        <div class="review-author">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer Photo">
          <div>
            <h4>John D.</h4>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>
      <div class="review-card">
        <p>"The Greek salad was fresh and delicious. I can't wait to come back!"</p>
        <div class="review-author">
          <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Customer Photo">
          <div>
            <h4>Maria K.</h4>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>
      <div class="review-card">
        <p>"Perfect spot for a romantic dinner. The filet mignon was cooked to perfection."</p>
        <div class="review-author">
          <img src="https://randomuser.me/api/portraits/men/18.jpg" alt="Customer Photo">
          <div>
            <h4>Liam S.</h4>
            <div class="stars">★★★★☆</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="achievements-section" data-aos="fade-up">
    <h1>Our <span class="yellow">Milestones</span></h1>
    <div class="achievements-container">
      <div class="achievement-card">
        <ion-icon name="people-circle-outline"></ion-icon>
        <h2>25,000+</h2>
        <p>Happy Customers Served</p>
      </div>
      <div class="achievement-card">
        <ion-icon name="restaurant-outline"></ion-icon>
        <h2>120+</h2>
        <p>Dishes on Our Menu</p>
      </div>
      <div class="achievement-card">
        <ion-icon name="trophy-outline"></ion-icon>
        <h2>15</h2>
        <p>International Awards</p>
      </div>
    </div>
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