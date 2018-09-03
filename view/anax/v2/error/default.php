<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */
?><div class="mt-4">
<?php
// Show incoming variables and view helper functions
echo showEnvironment(get_defined_vars(), get_defined_functions());

// Get detailed error message from the router, if any
$message = $di->get("router")->getErrorMessage();



?><h1><?= $header ?></h1>
<p><?= $text ?></p>

<?php if ($message && !defined("ANAX_PRODUCTION")) : ?>
<p><strong>Detailed message:</strong></p>
<p><?= $message ?></p>
<?php endif; ?>
</div>