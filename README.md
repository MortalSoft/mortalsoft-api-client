# mortalsoft-api-client
PHP API Client for Casino

Example of usage:
```php
<?php

require(__DIR__.'/mortalsoft.class.php');
$mortalapi = new Client("token");
var_export($mortalapi->listGames());

```
