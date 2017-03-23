<?php

// Extract from Object
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  'client' => [
    'first_name' => 'Gary',
    'last_name' => 'Newsome',
    'location' => 'Latrobe'
  ]
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use ($arr) {
  $location = $arr[$key]['location'];
  $carry[] = $location;
  return $carry;
}, []);

var_dump($locations);
var_dump($arr);

// Update Original Object
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  'client' => [
    'first_name' => 'Gary',
    'last_name' => 'Newsome',
    'location' => 'Latrobe'
  ]
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use ($arr) {
  $arr[$key]['Zip'] = 15601;
  $carry[] = $location;
  return $carry;
}, []);

var_dump($arr);

// Update Original Object For Reals
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  'client' => [
    'first_name' => 'Gary',
    'last_name' => 'Newsome',
    'location' => 'Latrobe'
  ]
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use (&$arr) {
  $location = $arr[$key]['location'];
  $arr[$key]['Zip'] = 15601;
  $carry[] = $location;
  return $carry;
}, []);

var_dump($arr);
