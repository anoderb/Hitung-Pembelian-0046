<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Total Pembelian 0046</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Hitung Total Pembelian 0046</h2>
            
            <form method="post" class="space-y-4">
                <div>
                    <label for="tb_0046" class="block text-sm font-medium text-gray-700">Total Belanja:</label>
                    <input type="number" name="tb_0046" id="tb_0046" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="member_0046" class="block text-sm font-medium text-gray-700">Apakah Anda Member?</label>
                    <select name="member_0046" id="member_0046" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                </div>

                <div>
                    <button type="submit" name="submit_0046" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        Hitung
                    </button>
                </div>
            </form>
            
                <!-- 
                Penamaan variabel:

                total_belanja → tb
                diskon → disc
                potongan_harga → ph
                total_akhir → ta 
                -->

            <?php
            if (isset($_POST['submit_0046'])) {
                $tb_0046 = isset($_POST['tb_0046']) ? $_POST['tb_0046'] : 0;
                $member_0046 = isset($_POST['member_0046']) ? $_POST['member_0046'] : 'tidak';
                $disc_0046 = 0;

                if ($member_0046 == "ya") {
                    $disc_0046 += 10;  
                    if ($tb_0046 >= 500000) {
                        $disc_0046 += 5;   
                    }
                    if ($tb_0046 >= 300000) {
                        $disc_0046 += 5;  
                    }
                } else {
                    if ($tb_0046 >= 500000) {
                        $disc_0046 = 10;   
                    }
                }

                $ph_0046 = $tb_0046 * ($disc_0046 / 100);  
                $ta_0046 = $tb_0046 - $ph_0046;            

                echo "<div class='mt-6 bg-green-100 border border-green-400 text-green-700 p-4 rounded'>";
                echo "<h3 class='text-lg font-bold mb-2'>Hasil Perhitungan:</h3>";
                echo "<p>Total Belanja: <strong>Rp " . number_format($tb_0046, 0, ',', '.') . "</strong></p>";
                echo "<p>Diskon: <strong>" . $disc_0046 . "%</strong></p>";
                echo "<p>Potongan Harga: <strong>Rp " . number_format($ph_0046, 0, ',', '.') . "</strong></p>";
                echo "<p>Total Akhir: <strong>Rp " . number_format($ta_0046, 0, ',', '.') . "</strong></p>";
                echo "</div>";
            }
            ?>
            <footer class="bg-gray-800 text-white text-center p-4 mt-6">
                <p class="text-sm">Copyright © Khamdanu Syakir 0046. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>
</html>
