$fb = new Facebook\Facebook([
  'app_id' => '700274447422038',
  'app_secret' => '687a729853806cf918fb0a05970fc0f4',
  'default_graph_version' => 'v7.0',
  ]);

$helper = $fb->getPageTabHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exception\ResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\SDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

// Logged in
echo '<h3>Page ID</h3>';
var_dump($helper->getPageId());

echo '<h3>User is admin of page</h3>';
var_dump($helper->isAdmin());

echo '<h3>Signed Request</h3>';
var_dump($helper->getSignedRequest());

echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());
