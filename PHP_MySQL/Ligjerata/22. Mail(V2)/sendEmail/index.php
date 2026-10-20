<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#174e45">
	<title>Send a message · Mail Studio</title>
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div class="page-shell">
		<header class="page-header">
			<a class="brand" href="index.php" aria-label="Mail Studio home">
				<span class="brand-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none">
						<rect x="3" y="5" width="18" height="14" rx="3" />
						<path d="m4 7 8 6 8-6" />
					</svg></span>
				Mail<span class="brand-light">Studio</span>
			</a>
			<span class="header-note">A little message. A meaningful connection.</span>
		</header>
		<main class="mail-card">
			<aside class="intro-panel" aria-labelledby="intro-title">
				<span class="eyebrow"><span class="status-dot"></span> MADE TO CONNECT</span>
				<h1 id="intro-title">Good things start<br>with a <em>hello.</em></h1>
				<p class="intro-copy">A new idea, a quick update, or just a few kind words. Make someone's inbox a little brighter.</p>
				<div class="mail-illustration" aria-hidden="true">
					<svg viewBox="0 0 400 290" fill="none">
						<circle cx="204" cy="147" r="112" fill="#ffffff" fill-opacity=".045" />
						<circle cx="204" cy="147" r="137" stroke="#fff" stroke-opacity=".1" stroke-dasharray="3 9" />
						<path d="m56 106 18-7M327 216l17 8M319 62l7-17" stroke="#b6d6a0" stroke-width="3" stroke-linecap="round" />
						<path d="m76 210 4-12 4 12 12 4-12 4-4 12-4-12-12-4ZM318 107l3-9 3 9 9 3-9 3-3 9-3-9-9-3Z" fill="#d4e7ae" />
						<g transform="rotate(-8 200 150)">
							<rect x="94" y="114" width="216" height="143" rx="13" fill="#103e37" />
							<rect x="94" y="114" width="216" height="138" rx="14" fill="#c7dca8" />
							<path d="m96 125 106 80 106-80" fill="#aac593" />
							<rect x="125" y="62" width="154" height="144" rx="8" fill="#fbfaf1" />
							<rect x="145" y="85" width="35" height="7" rx="3.5" fill="#52786a" />
							<rect x="145" y="109" width="112" height="5" rx="2.5" fill="#d4dcd0" />
							<rect x="145" y="123" width="112" height="5" rx="2.5" fill="#d4dcd0" />
							<rect x="145" y="137" width="78" height="5" rx="2.5" fill="#d4dcd0" />
							<path d="m94 131 108 75 108-75v107a14 14 0 0 1-14 14H108a14 14 0 0 1-14-14Z" fill="#d3e3b9" />
							<path d="m97 246 79-64M307 246l-79-64" stroke="#b3ca9c" stroke-width="2" />
						</g>
						<circle cx="284" cy="72" r="25" fill="#e4edc9" />
						<path d="m273 72 7 7 14-15" stroke="#174e45" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="illustration-caption">Small words. Big possibilities.</span>
				</div>
				<div class="intro-footer"><span class="small-spark" aria-hidden="true">✳</span><span>Thoughtfully written. Personally sent.</span></div>
			</aside>
			<section class="form-panel" aria-labelledby="form-title">
				<div class="form-heading">
					<span class="eyebrow">YOUR NEXT CONVERSATION</span>
					<h2 id="form-title">Send a message<span>.</span></h2>
					<p>Fill in the details below. We'll take it from here.</p>
				</div>
				<form action="submit.php" method="post" enctype="multipart/form-data">
					<div class="field-group">
						<label for="emailphp">Recipient email <span class="required-mark" aria-hidden="true">*</span></label>
						<div class="input-with-icon">
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<rect x="3" y="5" width="18" height="14" rx="3" />
								<path d="m4 7 8 6 8-6" />
							</svg>
							<input type="email" name="email" id="emailphp" placeholder="hello@example.com" autocomplete="email" required>
						</div>
					</div>
					<div class="field-group">
						<label for="subjectphp">Subject <span class="required-mark" aria-hidden="true">*</span></label>
						<input type="text" name="subject" id="subjectphp" placeholder="Give your message a title" required>
					</div>
					<div class="field-group message-group">
						<div class="label-row"><label for="messagephp">Your message <span class="required-mark" aria-hidden="true">*</span></label><span>Make it personal</span></div>
						<textarea name="message" id="messagephp" rows="6" placeholder="Hi there,&#10;&#10;I've been meaning to reach out…" required></textarea>
						<p class="field-hint">A few words can go a long way.</p>
					</div>
					<button type="submit" name="submit" value="Send!">Send message <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14m-6-6 6 6-6 6" />
						</svg></button>
					<p class="form-note">Double-check the recipient's email before sending.</p>
				</form>
			</section>
		</main>
		<footer class="page-footer"><span>Made for meaningful messages.</span><span>Mail Studio <span aria-hidden="true">↗</span></span></footer>
	</div>
</body>

</html>