<?Php
require 'vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

$database = $firebase->getDatabase();

$reference = $database->getReference('contacts');

$snapshot = $reference->getSnapshot();

$contacts = $snapshot->getValue();

print_r($contacts);

?>
