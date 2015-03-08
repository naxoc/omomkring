<?php
use Symfony\Component\HttpFoundation\Request;

require_once '../vendor/autoload.php';

$original = "Det handler om at smide flere omkring på om og omkring.\nI virkeligheden vil ord som ikke som udgangspunkt er irriterende også blive mere irriterende. Eksempler er ombudsmand eller omelet.";

$pattern = '/\bom(kring)?/';

$app = new Silex\Application();

// This one responds to GET and returns the default text and its transformation.
$app->get('/1/text', function () use ($app, $original, $pattern) {
  return $app->json(array(
    'transformed' => preg_replace($pattern, 'omkring$1', $original),
    'original' => $original
  ), 200);
});

// Handle the POST params in json format.
$app->before(function (Request $request) {
  if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
    $data = json_decode($request->getContent(), TRUE);
    $request->request->replace(is_array($data) ? $data : array());
  }
});

// This one responds to POST requests and transforms what is in original.
$app->post('/1/text', function (Request $request) use ($app, $pattern) {
  $original = $request->request->get('original') ?: '';

  return $app->json(array(
    'transformed' => preg_replace($pattern, 'omkring$1', $original),
    'original' => $original
  ), 200);
});

$app->run();
