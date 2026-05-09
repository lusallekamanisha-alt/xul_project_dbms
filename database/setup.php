<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

try {

    $schemaFile = __DIR__ . '/schema.sql';

    if (!file_exists($schemaFile)) {
        throw new Exception('schema.sql not found.');
    }

    $sql = file_get_contents($schemaFile);

    if ($sql === false) {
        throw new Exception('Failed to read schema.sql');
    }

    db(false)->exec($sql);

    require_once __DIR__ . '/seed.php';

    echo "<h2>Setup completed successfully.</h2>";

} catch (Throwable $e) {

    echo "<h2>Setup failed.</h2>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}