<?php
$api_key = 'key'; #ここにAPIキーを入れる

$endpoint = 'https://places.googleapis.com/v1/places:searchText';

$data = [
    'textQuery' => 'Delicious Low-priced Restaurants in Matsudo',
    'priceLevels' => ['PRICE_LEVEL_INEXPENSIVE', 'PRICE_LEVEL_MODERATE'],
];

$options = [
    'http' => [
        'header' => [
            'Content-type: application/json',
            'X-Goog-Api-Key: ' . $api_key,
            'X-Goog-FieldMask: places.displayName,places.formattedAddress,places.priceLevel',
        ],
        'method' => 'POST',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($endpoint, false, $context);
$result = json_decode($response, true);

print_r($result);
?>
