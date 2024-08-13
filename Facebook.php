<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture IP Address</title>
</head>
<body>
    <?php
    // Capture the IP address
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    // Define the API endpoint for IP lookup
    $apiUrl = "http://ip-api.com/json/{$ipAddress}?fields=isp";

    // Make the API request
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    // Check if the request was successful
    if ($data && $data['status'] === 'success') {
        $isp = $data['isp'];
    } else {
        $isp = 'ISP information not available';
    }
    ?>
    <h1>Welcome to Our Site!</h1>
    <p>We see you are visiting from the IP address: <strong><?php echo htmlspecialchars($ipAddress); ?></strong>.</p>
    <p>Your ISP is: <strong><?php echo htmlspecialchars($isp); ?></strong>.</p>
    <p>Thank you for visiting!</p>
</body>
</html>