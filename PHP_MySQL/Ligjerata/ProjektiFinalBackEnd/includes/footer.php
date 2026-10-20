</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div><a class="brand brand-light" href="<?= url('index.php') ?>"><span class="brand-mark">N</span>NEXA</a><p>Teknologji e zgjedhur me kujdes, per pune dhe jete me te mire.</p></div>
        <div><h4>Dyqani</h4><a href="<?= url('products.php') ?>">Te gjitha produktet</a><a href="<?= url('products.php?category=1') ?>">Audio</a><a href="<?= url('products.php?category=2') ?>">Aksesore</a></div>
        <div><h4>Ndihme</h4><a href="<?= url('contact.php') ?>">Na kontaktoni</a><a href="<?= url('cart.php') ?>">Shporta</a><a href="<?= url('login.php') ?>">Llogaria</a></div>
        <div><h4>Newsletter</h4><p>Merr lajmet dhe ofertat tona.</p><form class="newsletter" action="<?= url('contact.php') ?>" method="get"><input type="email" name="email" placeholder="Email-i juaj"><button aria-label="Dergo">→</button></form></div>
    </div>
    <div class="container footer-bottom"><span>© <?= date('Y') ?> Nexa Store</span><span>Projekt PHP & MySQL</span></div>
</footer>
<button class="chat-launcher" id="chatLauncher" type="button" aria-label="Hap suportin">
    <span class="chat-launcher-icon">✦</span><span>Support</span><i id="chatUnread" hidden></i>
</button>
<section class="chat-widget" id="chatWidget" data-send-url="<?= url('support/send.php') ?>" data-fetch-url="<?= url('support/fetch.php') ?>" data-csrf="<?= csrf_token() ?>" aria-label="Nexa Support Chat">
    <header class="chat-header"><div class="chat-avatar">N</div><div><strong>Nexa Support</strong><small><span></span> Online</small></div><button id="chatClose" type="button" aria-label="Mbylle">×</button></header>
    <div class="chat-messages" id="chatMessages"><div class="chat-loading">Duke hapur bisedën...</div></div>
    <div class="chat-profile" id="chatProfile">
        <p>Shkruaj të dhënat që ekipi ynë të të përgjigjet.</p>
        <input id="chatName" value="<?= e($_SESSION['user']['name'] ?? '') ?>" placeholder="Emri juaj" maxlength="100">
        <input id="chatEmail" type="email" value="<?= e($_SESSION['user']['email'] ?? '') ?>" placeholder="Email-i" maxlength="150">
    </div>
    <form class="chat-form" id="chatForm"><textarea id="chatInput" rows="1" maxlength="1000" placeholder="Shkruaj mesazhin..."></textarea><button type="submit" aria-label="Dërgo">➤</button></form>
    <div class="chat-error" id="chatError"></div>
</section>
<script src="<?= url('assets/js/app.js') ?>"></script>
</body>
</html>
