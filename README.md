# mortalsoft-api-client
PHP API Client for Casino

Example of usage:
```php
<?php

$apiBaseUrl = 'https://dev.mortalsoft.wtf';
$apiToken = 'YOUR_API_TOKEN';

$apiClient = new APIClient($apiBaseUrl, $apiToken);
//OR EMPTY PARAM FOR FULL LIST
$queryParams = [
    'name' => 'game1|game2',
];
$response = $apiClient->listGames($queryParams);
var_dump($response);

$identifier = 'john_doe';
$response = $apiClient->getBalance($identifier);
var_dump($response);

$identifier = 'john_doe';
$amount = 100;
$response = $apiClient->changeBalance($identifier, $amount);
var_dump($response);

$identifier = 'john_doe';
$response = $apiClient->createSession($identifier);
var_dump($response);

$identifier = 'john_doe';
$response = $apiClient->closeSession($identifier);
var_dump($response);

```
