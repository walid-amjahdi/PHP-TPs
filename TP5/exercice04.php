<?php
class Configuration
{
    public function __construct(
        public readonly string $apiKey,
        public readonly string $environnement
    ) {
    }
}

$config = new Configuration("12345-XYZ", "production");
echo $config->apiKey . PHP_EOL;

// Incorrect after initialization: $config->apiKey = "nouvelle-clef";
// Incorrect: Configuration::$apiKey; (apiKey is not static)
