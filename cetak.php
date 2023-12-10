<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundrydb";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database based on the latest inserted record
$sql = "SELECT * FROM laundry_orders ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laundry Receipt</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Add your custom styles or include additional stylesheets here -->
    </head>
    <body class="bg-gray-100 p-8">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4">Laundry Receipt</h2>
            <p><span class="font-semibold">Date:</span> <?php echo $row['tgl_order']; ?></p>
            <p><span class="font-semibold">Customer:</span> <?php echo $row['nama_pelanggan']; ?></p>
            <p><span class="font-semibold">Phone:</span> <?php echo $row['no_telepon']; ?></p>
            <p><span class="font-semibold">Berat:</span> <?php echo $row['berat_cucian']; ?></p>
            
            
            <!-- You can add additional sections or formatting here -->
        </div>
    </body>
    </html>

<?php
} else {
    echo "No data found";
}

$conn->close();
?>
