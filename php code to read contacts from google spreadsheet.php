<?php

// Load the Google API PHP Client Library
require __DIR__ . '/vendor/autoload.php';

// Set up the API client
$client = new Google_Client();
$client->setApplicationName('My App');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
$client->setAuthConfig('path/to/credentials.json');

// Get the API service
$sheets = new Google_Service_Sheets($client);

// Define the spreadsheet ID and range
$spreadsheetId = 'YOUR_SPREADSHEET_ID';
$range = 'Sheet1!A1:Z';

// Read the data from the spreadsheet
$response = $sheets->spreadsheets_values->get($spreadsheetId, $range);
$data = $response->getValues();

// Print the data
print_r($data);

?>
