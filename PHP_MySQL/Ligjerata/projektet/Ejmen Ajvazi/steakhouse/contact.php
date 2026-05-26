<?php
session_start();
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

<div class="track">
    <h1>Contact</h1>
</div>

<br><br>

<?php if(isset($_SESSION['email_status'])): ?>
    <div style="background: <?php echo $_SESSION['email_status'] == 'success' ? '#28a745' : '#dc3545'; ?>; color: white; padding: 15px; text-align: center; margin: 20px auto; width: 80%; border-radius: 5px;">
        <?php echo $_SESSION['email_message']; ?>
    </div>
    <?php unset($_SESSION['email_status']); unset($_SESSION['email_message']); ?>
<?php endif; ?>

<div>
    <form method="POST" action="send_email.php" class="contactform" id="contactform">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Enter your message here" required></textarea>
        <button type="submit" class="primary">Send</button>
    </form>
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