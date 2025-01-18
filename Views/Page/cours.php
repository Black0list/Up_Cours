<?php
use App\Controllers\CourController;

// Include header
require_once dirname(__DIR__, 1) . "\\Partials\\header.php";

$CourController = new CourController;

require_once dirname(__DIR__) . "\\Page\\Fcours.php";
?>



<?php
// Include footer
require_once dirname(__DIR__, 1) . "\\Partials\\footer.php";
?>
