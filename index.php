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
                    <label for="total_belanja" class="block text-sm font-medium text-gray-700">Total Belanja:</label>
                    <input type="number" name="total_belanja" id="total_belanja" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="member" class="block text-sm font-medium text-gray-700">Apakah Anda Member?</label>
                    <select name="member" id="member" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                </div>

                <div>
                    <button type="submit" name="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        Hitung
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $total_belanja = isset($_POST['total_belanja']) ? $_POST['total_belanja'] : 0;
                $member = isset($_POST['member']) ? $_POST['member'] : 'tidak';
                $diskon = 0;

                if ($member == "ya") {
                    $diskon += 0.10;
                    if ($total_belanja >= 500000) {
                        $diskon += 0.05;
                    }
                    if ($total_belanja >= 300000) {
                        $diskon += 0.05;
                    }
                } else {
                    if ($total_belanja >= 500000) {
                        $diskon = 0.10;
                    }
                }

                $potongan_harga = $total_belanja * $diskon;
                $total_akhir = $total_belanja - $potongan_harga;

                echo "<div class='mt-6 bg-green-100 border border-green-400 text-green-700 p-4 rounded'>";
                echo "<h3 class='text-lg font-bold mb-2'>Hasil Perhitungan:</h3>";
                echo "<p>Total Belanja: <strong>Rp " . number_format($total_belanja, 0, ',', '.') . "</strong></p>";
                echo "<p>Diskon: <strong>" . ($diskon * 100) . "%</strong></p>";
                echo "<p>Potongan Harga: <strong>Rp " . number_format($potongan_harga, 0, ',', '.') . "</strong></p>";
                echo "<p>Total Akhir: <strong>Rp " . number_format($total_akhir, 0, ',', '.') . "</strong></p>";
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
