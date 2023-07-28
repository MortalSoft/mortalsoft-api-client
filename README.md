# Example Usage of MortalSoft API Class

To interact with the API for operator-related actions, you can use the `MortalSoftClient` class. First, make sure you have the correct `$baseUrl` and `$token` for the API endpoint.

```php
<?php
require_once 'mortalsoft.class.php'; // Include the MortalSoftClient class file

$baseUrl = 'https://api-prod.mortalsoft.online';
$token = 'your_token';

// Create an instance of the APIClient
$client = new MortalSoftClient($baseUrl, $token);

// Example 1: List Games
$responseGames = $client->listGames();
if ($responseGames) {
    echo "List of Games:\n";
    print_r($responseGames);
} else {
    echo "Failed to fetch games list.\n";
}

// Example 2: Get Balance
$identifier = 'user123'; // Replace 'user123' with the actual user identifier
$responseBalance = $client->getBalance($identifier);
if ($responseBalance) {
    echo "User Balance:\n";
    print_r($responseBalance);
} else {
    echo "Failed to fetch user balance.\n";
}

// Example 3: Change Balance
$identifier = 'user123'; // Replace 'user123' with the actual user identifier
$amount = 50.00; // Replace 50.00 with the desired amount
$responseChangeBalance = $client->changeBalance($identifier, $amount);
if ($responseChangeBalance) {
    echo "Balance changed successfully.\n";
} else {
    echo "Failed to change user balance.\n";
}

// Example 4: Create Session
$identifier = 'user123'; // Replace 'user123' with the actual user identifier
$responseCreateSession = $client->createSession($identifier);
if ($responseCreateSession) {
    echo "User session created. JWT Token: {$responseCreateSession['token']}\n";
} else {
    echo "Failed to create user session.\n";
}

?>
