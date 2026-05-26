<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "om3");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to count unreplied messages
$query = "SELECT COUNT(*) AS unreplied_count FROM emailcontacts WHERE replied = 0"; // Assuming 'replied' is a column indicating whether a message has been replied to
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$unreplied_count = $row['unreplied_count'];

$query = "SELECT COUNT(*) AS total_messages FROM emailcontacts";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_messages = $row['total_messages'];

mysqli_close($conn);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <style>
        body {
    display: flex;
    font-family: Arial, sans-serif;
    margin: 0;
    height: 100vh;
    background-color: #adb9ff;
}

.sidebar {
    width: 250px;
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='250' height='1250' preserveAspectRatio='none' viewBox='0 0 250 1250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1059%26quot%3b)' fill='none'%3e%3crect width='250' height='1250' x='0' y='0' fill='rgba(3%2c 19%2c 36%2c 1)'%3e%3c/rect%3e%3cpath d='M71.34050022389478 250.32801859051497L109.28996263236982 236.51554386742583 57.528025500805654 212.37855618203994z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M77.63519518790244 336.79779800818756L76.78819978906651 385.32213190892793 125.31253368980686 386.16912730776386 126.15952908864278 337.6447934070235z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M141.7565767634654 550.9510900585196L105.48866392846284 578.2809226641109 169.0864093690567 587.2190028935222z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M270.655%2c1130.059C296.788%2c1130.938%2c323.416%2c1120.289%2c336.19%2c1097.473C348.729%2c1075.077%2c342.164%2c1047.982%2c328.913%2c1026C316.159%2c1004.843%2c295.353%2c988.221%2c270.655%2c988.753C246.703%2c989.269%2c228.255%2c1007.495%2c216.584%2c1028.418C205.266%2c1048.708%2c201.42%2c1072.797%2c212.332%2c1093.308C223.899%2c1115.051%2c246.041%2c1129.231%2c270.655%2c1130.059' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M6.776%2c833.374C19.59%2c832.716%2c28.693%2c822.111%2c34.676%2c810.76C40.187%2c800.306%2c42.118%2c787.893%2c36.117%2c777.712C30.197%2c767.668%2c18.423%2c763.951%2c6.776%2c763.423C-6.14%2c762.837%2c-20.442%2c764.035%2c-27.569%2c774.823C-35.268%2c786.477%2c-33.642%2c801.859%2c-26.575%2c813.907C-19.595%2c825.807%2c-7.002%2c834.082%2c6.776%2c833.374' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M11.402082992592533 1176.6322786496964L33.58509829095323 1201.2690130567032 59.44869225228314 1155.6761229056588z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1059'%3e%3crect width='250' height='1250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
    background-color: #333;
    color: #fff;
    height: 100%;
    position: fixed;
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
    font-size: 15px;
    transition: 0.5s ease-in-out;
    height: 20px;
    width: 65px;
}

.sidebar ul li a:hover {
    font-size: 17px;
    color: grey;
    border-radius: 5px;
    height: 20px;
    width: 70px;
}

.main-content {
    margin-left: 250px;
    padding: 20px;
    flex: 1;
    box-sizing: border-box;
}

header {
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1250' height='200' preserveAspectRatio='none' viewBox='0 0 1250 200'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1052%26quot%3b)' fill='none'%3e%3crect width='1250' height='200' x='0' y='0' fill='rgba(3%2c 19%2c 36%2c 1)'%3e%3c/rect%3e%3cpath d='M582.8033606759623 57.58706042430619L565.7378300674307 92.57658338956759 626.7548798195886 100.68011781973428z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M587.0578691673763 37.10516422716935L617.0997516450115 28.49079304719912 578.4434979874061 7.0632817495342834z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1268.810469485934 75.2479401218998L1227.7642122509376 79.56207559910233 1273.1246049631366 116.29419735689616z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M602.012%2c105.988C608.354%2c105.826%2c612.182%2c99.639%2c615.135%2c94.024C617.825%2c88.908%2c619.622%2c82.955%2c616.769%2c77.928C613.887%2c72.85%2c607.844%2c70.609%2c602.012%2c70.904C596.675%2c71.174%2c592.391%2c74.723%2c589.635%2c79.302C586.771%2c84.061%2c585.338%2c89.686%2c587.675%2c94.725C590.416%2c100.634%2c595.5%2c106.154%2c602.012%2c105.988' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M26.349093522914163-1.8921055107300244L10.138941768616696 16.111091894873134 45.24881375417017 31.424720823517752z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M748.693218127146 145.95607147784634L725.3520080098774 152.64905577699992 747.062089517242 184.31437880332606z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1052'%3e%3crect width='1250' height='200' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
    background-color: #4CAF50;
    color: #fff;
    padding: 20px;
    text-align: center;
    box-sizing: border-box;
}

section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
}

.card {
    background-color: #f4f4f4;
    border-radius: 10px;
    padding: 20px;
    width: calc(50% - 20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    margin-bottom: 20px;
}

.card h3 {
    margin-top: 0;
}

/* Responsive styles */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .main-content {
        margin-left: 200px;
    }

    section {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 90%;
    }
}

@media (max-width: 576px) {
    .sidebar {
        width: 100%;
        position: relative;
    }

    .main-content {
        margin-left: 0;
    }

    .card {
        width: 100%;
    }
}

    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="color:white;">Dashboard</h2>
        <ul>
            
            <li><a href="adminsite.php">Profile</a></li>
            <li><a href="Messages.php">Messages</a></li>
            
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Miresevini o sheff!!</h1>
        </header>
        <section>
        <div class="card">
                <h3>Mesazhe te pakthyera</h3>
                <p>Jane <?= $unreplied_count ?> mesazhe te pakthyera!</p>
            </div>
            <div class="card">
    <h3>Numri total userave</h3>
    <p>Jane <?= $total_messages ?> users qe e kane dhene emailin e tyre. </p>
</div>
        </section>
    </div>
    <script>
        // Add JavaScript functionality here if needed
        document.addEventListener('DOMContentLoaded', () => {
            console.log('Dashboard loaded!');
        });
    </script>
</body>
</html>
