<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title> Delete &amp; Update File </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head> 
    <body>
        <main class="page-shell">
            <header class="page-header">
                <div>
                    <p class="eyebrow">Menaxhimi i produkteve</p>
                    <h1>Update &amp; Delete</h1>
                    <p class="subtitle">Shiko, ndrysho ose fshi produktet e regjistruara.</p>
                </div>
                <a class="button button-primary" href="insertimi.php">+ Shto produkt</a>
            </header>
        <div class="table-card">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Fotografia</th>
                <th>Përshkrimi</th>
                <th>Fshirja</th>
                <th>Ndryshimi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $con =mysqli_connect("localhost","kebir","Kebir123!","login");
                    mysqli_select_db($con,'login');
                $select = "SELECT * FROM upload;";
                $query = mysqli_query($con,$select);
                
                while($row = mysqli_fetch_array($query))
                {
                    $id = $row['id'];
                    $fileName = $row['fileName'];
                    $fileUpload = $row['fileUpload'];
                    $description = $row['Description'];
                    $safeFileName = basename($fileUpload);
                    $filePath = 'file/' . rawurlencode($safeFileName);

                    if (!is_file(__DIR__ . '/file/' . $safeFileName)) {
                        $filePath = '../20. Insertimi/file/' . rawurlencode($safeFileName);
                    }
            ?>
            <tr>
                <td class="file-id">#<?php echo $id; ?></td>
                <td class="file-name"><?php echo htmlspecialchars($fileName); ?></td>
                <td><img class="file-image" src="<?php echo $filePath; ?>" alt="<?php echo htmlspecialchars($fileName); ?>"></td>
                <td class="description"><?php echo htmlspecialchars($description); ?></td>
                <td><button class="button-delete" onclick="checkDelete(<?php echo $id?>);" value="Delete">Fshije</button></td>
                <td><a class="button button-edit" href="update.php?update=<?php echo $id; ?>">Ndrysho</a></td>
            </tr>
              <?php  } ?>
            </tbody>
        </table>
        </div>
        </main>
        <script language="JavaScript" type="text/javascript">
            function checkDelete(delId){
                if(confirm('A jeni te sigurt?')){
                    document.location.href = 'delete.php?delete='+delId;
                    return true;
                }
            }
        </script>
    </body>
</html>
