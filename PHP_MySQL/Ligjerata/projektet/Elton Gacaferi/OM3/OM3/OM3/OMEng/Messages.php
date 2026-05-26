<?php
session_start();

// Include Composer autoload file
require 'vendor/autoload.php';

// Use PHPMailer namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$conn = mysqli_connect("localhost", "root", "", "om3");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete request
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM emailcontacts WHERE id='$id'";
    mysqli_query($conn, $deleteQuery);
}

// Handle reply request
if (isset($_POST['reply'])) {
    $id = $_POST['id'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Get user email
    $result = mysqli_query($conn, "SELECT email FROM emailcontacts WHERE id='$id'");
    $user = mysqli_fetch_assoc($result);
    $email = $user['email'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'om3.company@gmail.com';
        $mail->Password = 'nwew udja owzx dnfh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('om3.company@gmail.com', 'OM3-Company');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reply from OM3-Company';
        $mail->Body    = $message;

        $mail->send();

        // Update status to replied
        $updateQuery = "UPDATE emailcontacts SET replied=1 WHERE id='$id'";
        mysqli_query($conn, $updateQuery);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Fetch data from the database
$query = "SELECT * FROM emailcontacts";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            background-color: #adb9ff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
            
        }
        .container {
            background-color: #adb9ff;
            display: flex;
            width: 100%;
        }
        .sidebar {
            width: 25%; /* 1/4 of the container width */
             background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='250' height='1250' preserveAspectRatio='none' viewBox='0 0 250 1250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1059%26quot%3b)' fill='none'%3e%3crect width='250' height='1250' x='0' y='0' fill='rgba(3%2c 19%2c 36%2c 1)'%3e%3c/rect%3e%3cpath d='M71.34050022389478 250.32801859051497L109.28996263236982 236.51554386742583 57.528025500805654 212.37855618203994z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M77.63519518790244 336.79779800818756L76.78819978906651 385.32213190892793 125.31253368980686 386.16912730776386 126.15952908864278 337.6447934070235z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M141.7565767634654 550.9510900585196L105.48866392846284 578.2809226641109 169.0864093690567 587.2190028935222z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M270.655%2c1130.059C296.788%2c1130.938%2c323.416%2c1120.289%2c336.19%2c1097.473C348.729%2c1075.077%2c342.164%2c1047.982%2c328.913%2c1026C316.159%2c1004.843%2c295.353%2c988.221%2c270.655%2c988.753C246.703%2c989.269%2c228.255%2c1007.495%2c216.584%2c1028.418C205.266%2c1048.708%2c201.42%2c1072.797%2c212.332%2c1093.308C223.899%2c1115.051%2c246.041%2c1129.231%2c270.655%2c1130.059' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M6.776%2c833.374C19.59%2c832.716%2c28.693%2c822.111%2c34.676%2c810.76C40.187%2c800.306%2c42.118%2c787.893%2c36.117%2c777.712C30.197%2c767.668%2c18.423%2c763.951%2c6.776%2c763.423C-6.14%2c762.837%2c-20.442%2c764.035%2c-27.569%2c774.823C-35.268%2c786.477%2c-33.642%2c801.859%2c-26.575%2c813.907C-19.595%2c825.807%2c-7.002%2c834.082%2c6.776%2c833.374' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M11.402082992592533 1176.6322786496964L33.58509829095323 1201.2690130567032 59.44869225228314 1155.6761229056588z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1059'%3e%3crect width='250' height='1250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
            color: #fff;
            height: 100vh;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        .main-content {
            width: 75%; /* 3/4 of the container width */
            padding: 20px;
            box-sizing: border-box;
            background-color: #adb9ff;
            overflow-y: auto;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='250' height='1250' preserveAspectRatio='none' viewBox='0 0 250 1250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1059%26quot%3b)' fill='none'%3e%3crect width='250' height='1250' x='0' y='0' fill='rgba(3%2c 19%2c 36%2c 1)'%3e%3c/rect%3e%3cpath d='M71.34050022389478 250.32801859051497L109.28996263236982 236.51554386742583 57.528025500805654 212.37855618203994z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M77.63519518790244 336.79779800818756L76.78819978906651 385.32213190892793 125.31253368980686 386.16912730776386 126.15952908864278 337.6447934070235z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M141.7565767634654 550.9510900585196L105.48866392846284 578.2809226641109 169.0864093690567 587.2190028935222z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M270.655%2c1130.059C296.788%2c1130.938%2c323.416%2c1120.289%2c336.19%2c1097.473C348.729%2c1075.077%2c342.164%2c1047.982%2c328.913%2c1026C316.159%2c1004.843%2c295.353%2c988.221%2c270.655%2c988.753C246.703%2c989.269%2c228.255%2c1007.495%2c216.584%2c1028.418C205.266%2c1048.708%2c201.42%2c1072.797%2c212.332%2c1093.308C223.899%2c1115.051%2c246.041%2c1129.231%2c270.655%2c1130.059' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M6.776%2c833.374C19.59%2c832.716%2c28.693%2c822.111%2c34.676%2c810.76C40.187%2c800.306%2c42.118%2c787.893%2c36.117%2c777.712C30.197%2c767.668%2c18.423%2c763.951%2c6.776%2c763.423C-6.14%2c762.837%2c-20.442%2c764.035%2c-27.569%2c774.823C-35.268%2c786.477%2c-33.642%2c801.859%2c-26.575%2c813.907C-19.595%2c825.807%2c-7.002%2c834.082%2c6.776%2c833.374' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M11.402082992592533 1176.6322786496964L33.58509829095323 1201.2690130567032 59.44869225228314 1155.6761229056588z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1059'%3e%3crect width='250' height='1250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
            color: white;
        }
        tr.replied {
            background-color: #d4edda; /* Light green background for replied */
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .reply-btn {
            background-color: #000a29;
        }
        .replied-btn {
            background-color: #324378;
        }
        .message-box {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .message-box textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        .message-box button {
            margin-right: 10px;
            background-color: black;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="adminsite.php">Profile</a></li>
            <li><a href="messages.php">Messages</a></li>    
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2>Messages</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="<?= $row['replied'] ? 'replied' : '' ?>">
                    <td><?= $row['email'] ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                        <button onclick="openReplyBox(<?= $row['id'] ?>)" class="<?= $row['replied'] ? 'replied-btn' : 'reply-btn' ?>">
                            <?= $row['replied'] ? 'Replied' : 'Reply' ?>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <div id="reply-box" class="message-box">
            <h3>Reply to Message</h3>
            <form method="post">
                <input type="hidden" name="id" id="reply-id">
                <textarea name="message" rows="5" required></textarea>
                <button type="submit" name="reply" style="backround-color:black;">Send</button>
                <button type="button" onclick="closeReplyBox()" style="backround-color:black;">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
function openReplyBox(id) {
    document.getElementById('reply-id').value = id;
    document.getElementById('reply-box').style.display = 'block';
}

function closeReplyBox() {
    document.getElementById('reply-box').style.display = 'none';
}
</script>

</body>
</html>
