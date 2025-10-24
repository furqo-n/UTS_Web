<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }
            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
                width: 30%;
            }
            td{
                color: #666;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php
                $error = '';
                $first = '';
                $last = '';
                $city = '';
                $age = 0;

                if (isset($_POST['submit'])) {
                    $first = trim($_POST['first_name'] ?? '');
                    $last = trim($_POST['last_name'] ?? '');
                    $city = trim($_POST['city'] ?? '');
                    $age_raw = trim($_POST['age'] ?? '');
                    if (!is_numeric($age_raw)) {
                        $error = 'Umur harus berupa angka.';
                    } else {
                        $age = (int)$age_raw;
                        if ($age < 10) {
                            $error = 'Umur harus minimal 10 tahun.';
                        }
                    }
                }
            ?>

            <?php if ($error): ?>
                <?php
                    $error_style = '';
                    if ($error === 'Umur harus minimal 10 tahun.') {
                        $error_style = 'background-color: rgba(220,53,69,0.12); border: 1px solid rgba(220,53,69,0.25); border-radius: 6px;';
                    }
                ?>
                <div style="text-align: center; color: #dc3545; padding: 20px; <?php echo $error_style; ?>">
                    <h3>Error</h3>
                    <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="back-button"><a href="index.html">Kembali ke Form Registrasi</a></div>
                </div>
            <?php else: ?>
                <div class="success-message">Registrasi Berhasil!</div>

                <table>
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th>Nama Lengkap</th>
                            <th style="width:15%;">Umur</th>
                            <th>Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $candidate = 2;
                        while ($candidate <= $age):
                            if (in_array($candidate, [4, 8], true)) {
                                $candidate += 2;
                                continue;
                            }
                            $no = $candidate;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= htmlspecialchars($first . ' ' . $last, ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= $age ?> tahun</td>
                                <td><?= htmlspecialchars($city, ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php
                            $candidate += 2;
                        endwhile;
                        ?>
                    </tbody>
                </table>

                <div class="back-button"><a href="index.html">Kembali ke Form Registrasi</a></div>
            <?php endif; ?>
        </div>
    </body>
</html>
