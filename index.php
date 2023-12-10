<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "your_server_name";
    $db_username = "your_db_username";
    $db_password = "your_db_password";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    @$laundryWeight = $_POST['berat-cucian'];
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'cetak') {
            // Redirect to cetak.php
            header("Location: cetak.php");
            exit();
        } elseif ($action === 'kembali') {
            // Redirect to index.php
            header("Location: index.php");
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
    <title>Laundry Weight Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex flex-col items-center justify-center min-h-screen">

    <!-- Logo and Title -->
    <div class="mb-8">
        <img src="bigklinlogo.jpeg" alt="Logo" class="h-48 mx-auto my-auto object-contain">
        <h1 class="text-2xl flex items-center justify-center font-bold text-gray-800">BIGKLIN SMART APP</h1>
        <h1 class="text-2xl flex items-center justify-center font-bold text-gray-800">SELF SERVICE MACHINE</h1>
    </div>

    <!-- HTML form for laundry weight -->
    <form method="post" action="detail.php" class="bg-white p-8 rounded shadow-md w-full sm:w-auto md:w-auto">
        <div class="flex items-center mb-4">
            <label for="berat-cucian" class="mr-4 text-sm font-medium text-gray-600">Berat Cucian:</label>
            <input type="number" id="berat-cucian" name="berat-cucian" step="0.1" required
                class="w-auto md:w-64 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            <span class="ml-2">KG</span>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
            Next Step
        </button>
    </form>

</body>
</html>

