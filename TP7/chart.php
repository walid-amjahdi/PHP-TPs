<?php

try {
    require_once __DIR__ . "/config.php";
    require_once __DIR__ . "/vendor/autoload.php";
    \mitoteam\jpgraph\MtJpGraph::load("line");
    $stmt = $pdo->query("SELECT cin, birth FROM users ORDER BY id");
    $rows = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log("Unable to load chart data: " . $e->getMessage());
    http_response_code(500);
    header("Content-Type: text/plain; charset=utf-8");
    exit("The chart data could not be loaded.");
}

if (!class_exists("Graph") || !class_exists("LinePlot")) {
    http_response_code(500);
    header("Content-Type: text/plain; charset=utf-8");
    exit("JpGraph is not installed. Run 'composer install' in the TP7 folder.");
}

$labels = [];
$birthYears = [];
foreach ($rows as $row) {
    $year = (int) date("Y", strtotime($row["birth"]));
    if ($year > 0) {
        $labels[] = $row["cin"];
        $birthYears[] = $year;
    }
}

if (empty($birthYears)) {
    $labels = ["No data"];
    $birthYears = [0];
}

$graph = new Graph(900, 420);
$graph->SetScale("textlin");
$graph->SetMargin(70, 30, 45, 100);
$graph->title->Set("CIN and birth year");
$graph->xaxis->title->Set("CIN");
$graph->yaxis->title->Set("Birth year");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45);
$graph->SetColor("#ffffff");
$graph->SetBox(true);

$plot = new LinePlot($birthYears);
$plot->SetColor("#2563eb");
$plot->SetWeight(3);
$plot->mark->SetType(MARK_FILLEDCIRCLE);
$plot->mark->SetFillColor("#60a5fa");
$plot->mark->SetColor("#1d4ed8");
$graph->Add($plot);
$graph->Stroke();
