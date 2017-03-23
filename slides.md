## PHP array_functions and Pass By Reference
 
Paul Scarrone (@PaulSCoder)

[SavvySoftWorks](https://savvysoftworks.com)

---

## Lets review

- array_chunk
- array_reduce
- array_map
- array_fill
- array_values

---

## Primitives in C

- Character
- Integer
- Boolean
- Reference

---

## Primitive Type in PHP

- Array
- String

---

## array_map

<pre style="left: -6em;">
    array array_map ( callable $callback , array $array1 [, array $... ] )
</pre>

<pre>
    $arr = ["a", "a", "a"];
    array_map(function ($element) {
        return "H".$element;
    }, $arr);
</pre>

---

## Ha Ha Ha

---

## array_reduce

<pre style="left: -8em;">
    mixed array_reduce ( array $array , callable $callback [, mixed $initial = NULL ] )
</pre>

<pre>
    $arr = ["H", "o", "w", " ", "N", "o", "w"];
    array_map($arr, function ($carry, $element) {
        return $carry.$element;
    }, "");
</pre>

---

## How Now

---

## array_filter

<pre style="left: -7em;">
    array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] )
</pre>

<pre>
    $arr = ["H", "o", "w", " ", "N", "o", "w"];
    array_filter ($arr, function ($element) {
        return $element != " ";
    });
</pre>

---

## HOWNOW

---

## Big Question
##### Why is the argument pattern different for many of the array functions

- Definition Varadic Function - a function of indefinite arity

---

## What about Objects
<pre>
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  ...
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use ($arr) {
  $location = $arr[$key]['location'];
  $carry[] = $location;
  return $carry;
}, []);

var_dump($locations);
</pre>

---

## Updating Original Object
<pre>
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  ...
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use ($arr) {
  $arr[$key]['Zip'] = 15601;
  return $carry;
}, []);

var_dump($arr);
</pre>

---

## Output (Fail)
<pre>
array(2) {
  ["owner"]=>
  array(3) {
    ["first_name"]=>
    string(4) "Paul"
    ["last_name"]=>
    string(8) "Scarrone"
    ["location"]=>
    string(10) "Greensburg"
  }
}
</pre>

---

## Updating Original Object (Real)
<pre>
$arr = [
  'owner' => [
    'first_name' => 'Paul',
    'last_name' => 'Scarrone',
    'location' => 'Greensburg'
  ],
  ...
];

$keys = array_keys($arr);

$locations = array_reduce($keys,  function ($carry, $key) use (&$arr) {
  $arr[$key]['Zip'] = 15601;
  return $carry;
}, []);

var_dump($arr);
</pre>

---

## Output
<pre>
array(2) {
  ["owner"]=>
  array(4) {
    ["first_name"]=>
    string(4) "Paul"
    ["last_name"]=>
    string(8) "Scarrone"
    ["location"]=>
    string(10) "Greensburg"
    ["Zip"]=>
    int(15601)
  }
}
</pre>
