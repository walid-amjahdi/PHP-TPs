<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

$count = 15;
if (isset($argv[1])) {
    $count = filter_var($argv[1], FILTER_VALIDATE_INT, [
        "options" => ["min_range" => 1, "max_range" => 100],
    ]);
    if ($count === false) {
        fwrite(STDERR, "Usage: php seed.php [number of users, 1-100]\n");
        exit(1);
    }
}

$faker = Faker\Factory::create("fr_FR");
$insert = $pdo->prepare(
    "INSERT INTO users (cin, full_name, tel, email, birth) VALUES (?, ?, ?, ?, ?)"
);
$inserted = 0;

try {
    $pdo->beginTransaction();

    while ($inserted < $count) {
        $cin = strtoupper($faker->randomLetter()) . strtoupper($faker->randomLetter())
            . $faker->numerify("######");
        $birth = $faker->dateTimeBetween("-70 years", "-18 years")->format("Y-m-d");
        $tel = "0" . $faker->randomElement(["5", "6", "7"]) . $faker->numerify("########");

        try {
            $insert->execute([
                $cin,
                $faker->name(),
                $tel,
                $faker->unique()->safeEmail(),
                $birth,
            ]);
            $inserted++;
        } catch (PDOException $e) {
            if ($e->getCode() !== "23000") {
                throw $e;
            }
        }
    }

    $pdo->commit();
    echo "Inserted {$inserted} fake users.\n";
} catch (Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log("Unable to seed users: " . $e->getMessage());
    fwrite(STDERR, "Unable to seed users. Check the database configuration.\n");
    exit(1);
}
