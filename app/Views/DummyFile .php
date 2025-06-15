
<!-- index file mate  -->
require _DIR_.'/vendor/autoload.php';
$app = require_once _DIR_.'/bootstrap/app.php'

<!-- Htaccess file mate  -->
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [L]
</IfMo
dule>
;
