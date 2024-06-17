<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('data-1.json'), true);

$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$rangoPrecio = isset($_POST['precio']) ? $_POST['precio'] : '0;100000';

$resultados = array_filter($data, function($item) use ($ciudad, $tipo, $rangoPrecio) {
  $precio = intval(preg_replace('/[^0-9]/', '', $item['Precio']));
  list($minPrecio, $maxPrecio) = explode(';', $rangoPrecio);

  $dentroDelRango = $precio >= $minPrecio && $precio <= $maxPrecio;
  $ciudadCoincide = empty($ciudad) || $item['Ciudad'] == $ciudad;
  $tipoCoincide = empty($tipo) || $item['Tipo'] == $tipo;

  return $dentroDelRango && $ciudadCoincide && $tipoCoincide;
});

// Log de depuración para verificar los resultados
file_put_contents('debug.log', print_r($resultados, true), FILE_APPEND);

echo json_encode(array_values($resultados));
?>

