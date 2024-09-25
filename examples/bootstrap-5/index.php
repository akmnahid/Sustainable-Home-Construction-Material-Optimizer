<?php

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/MaterialsData.php';

use App\MaterialOptimizer;

// Initialize MaterialsData provider
$provider = new MaterialsData();

$budget = (float)($_POST['budget'] ?? 0);
$area = (float)($_POST['area'] ?? 0);
$environmentalImpactThreshold = (float)($_POST['impactThreshold'] ?? 100);  // Default to 100 if no threshold given
$selectedMaterials = $_POST['materials'] ?? [];  // Selected materials

// Get the full list of available materials
$allMaterials = $provider->getMaterials();

// Filter out the selected materials
$materials = [];
foreach ($allMaterials as $material) {
    if (in_array($material->name, $selectedMaterials)) {
        $materials[] = $material;
    }
}

// Instantiate the optimizer and get suggestions
$optimizer = new MaterialOptimizer();
$suggestedMaterials = $optimizer->suggestMaterials($materials, $budget, $area, $environmentalImpactThreshold);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Optimizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Sustainable Home Construction Material Optimizer</h1>
    <form method="POST" action="index.php">
        <div class="mb-3">
            <label for="budget" class="form-label">Enter Your Total Budget</label>
            <input type="number" class="form-control" id="budget" name="budget" required value="<?= htmlspecialchars($budget) ?>">
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Enter Area to Cover (in square feet)</label>
            <input type="number" class="form-control" id="area" name="area" required value="<?= htmlspecialchars($area) ?>">
        </div>
        <div class="mb-3">
            <label for="impactThreshold" class="form-label">Max Environmental Impact Score</label>
            <input type="number" class="form-control" id="impactThreshold" name="impactThreshold" required value="<?= htmlspecialchars($environmentalImpactThreshold) ?>">
        </div>
        <div class="mb-3">
            <label for="materials" class="form-label">Select Materials</label>
            <select multiple class="form-control" id="materials" name="materials[]" required>
                <?php foreach ($allMaterials as $material): ?>
                    <option value="<?= htmlspecialchars($material->name); ?>" <?= in_array($material->name, $selectedMaterials) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($material->name); ?> (Cost: <?= $material->costPerUnit; ?> per <?= $material->unit; ?>, Impact: <?= $material->environmentalImpactScore; ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Optimize</button>
    </form>

    <?php if ($budget > 0 && $area > 0 && !empty($selectedMaterials)): ?>
        <div class="mt-4">
            <h3>Material Suggestions:</h3>
            <ul class="list-group">
                <?php foreach ($suggestedMaterials as $suggestion): ?>
                    <li class="list-group-item">
                        <?= $suggestion['material']->displayInfo(); ?> <br>
                        Total Cost: $<?= number_format($suggestion['totalCost'], 2); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
</body>
</html>