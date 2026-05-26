<!doctype html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        input, textarea {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<form action="sendEmail.php" method="POST" class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-6" align="center">

            <input type="text" name="name" placeholder="Name" class="form-control" required>

            <input type="email" name="email" placeholder="Email" class="form-control" required>

            <input type="text" name="subject" placeholder="Subject" class="form-control" required>

            <textarea name="message" class="form-control" placeholder="Email Body" required></textarea>

            <input type="submit" name="submit" value="Send An Email" class="btn btn-primary mt-3">

        </div>
    </div>
</form>

</body>
</html>
