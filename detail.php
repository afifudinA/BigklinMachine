<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    @$laundryWeight = $_POST['berat-cucian'];
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'cetak') {
            // Redirect to cetak.php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "laundrydb";
            $conn = new mysqli($servername, $username, $password, $database);

            $tglOrder = $_POST['tgl-order'];
            $namaPelanggan = $_POST['nama-pelanggan'];
            $noTelepon = $_POST['no-telepon'];
            $layanan1 = $_POST['layanan-1'];
            $layanan2 = $_POST['layanan-2'];
            $jumlahPakaian = $_POST['jumlah-pakaian'];
            $aromaParfum = $_POST['aroma-parfum'];
            $hargaTotal = $_POST['harga-total'];
            $status = $_POST['status'];
            $sql = "INSERT INTO laundry_orders (tgl_order, nama_pelanggan, no_telepon, layanan_1, layanan_2, berat_cucian, jumlah_pakaian, aroma_parfum, harga_total, status) VALUES ('$tglOrder', '$namaPelanggan', '$noTelepon', '$layanan1', '$layanan2', '$laundryWeight', '$jumlahPakaian', '$aromaParfum', '$hargaTotal', '$status')";
            
            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            header("Location:cetak.php");
            exit();
        } elseif ($action === 'kembali') {
            // Redirect to index.php
            header("Location:index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    
    <form method="post" class="bg-white p-8 rounded shadow-md w-full sm:w-auto md:w-96">
        <div class="mb-5 flex items-center">
            <label for="tgl-order" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Tgl Order</label>
            <input type="date" id="tgl-order" name="tgl-order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo isset($tglOrder) ? $tglOrder : ''; ?>">
        </div>

        <div class="mb-5 flex items-center">
            <label for="nama-pelanggan" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
            <input type="text" id="nama-pelanggan" name="nama-pelanggan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        
        <div class="mb-5 flex items-center">
            <label for="no-telepon" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
            <input type="text" id="no-telepon" name="no-telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5 flex-auto flex space-x-4">
            <div class="w-1/3">
                <label for="layanan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan</label>
            </div>
            <div class="w-1/4">
                <select id="layanan-1" name="layanan-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="CKS">CKS</option>
                    <option value="CKL">CKL</option>
                </select>            
            </div>
            <div class="w-1/2">
                <select id="layanan-2" name="layanan-2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Self-service">Self-service</option>
                    <option value="Drop-off">Drop-off</option>
                </select>              
            </div>
        </div>
        <div class="mb-5 flex items-center">
            <label for="berat-cucian" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">berat-cucian</label>
            <input type="nimber" id="berat-cucian" name="berat-cucian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="<?php echo isset($laundryWeight) ? $laundryWeight : ''; ?>">
            <span class="ml-2">KG</span>
        </div>

        <div class="mb-5 flex items-center">
            <label for="jumlah-pakaian" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Jumlah Pakaian</label>
            <input type="text" id="jumlah-pakaian" name="jumlah-pakaian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5 flex items-center">
            <label for="aroma-parfum" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Aroma Parfum</label>
            <input type="text" id="aroma-parfum" name="aroma-parfum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5 flex items-center">
            <label for="harga-total" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Harga Total</label>
            <input type="text" id="harga-total" name="harga-total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5 flex items-center">
            <label for="status" class="block mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <input type="text" id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5 flex items-center">
            <button type="submit" name="action" value="cetak" class="w-1/3 bg-green-500 text-white px-3 py-2 m-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
                Cetak
            </button>
            <button type="submit" name="action" value="kembali" class="w-2/3 bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
                Ke menu Sebelumnya
            </button>
        </div>
    </form>
</body>
</html>
