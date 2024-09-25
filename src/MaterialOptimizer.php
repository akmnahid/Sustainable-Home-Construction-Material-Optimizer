<?php

namespace SustainableHomeConstruction;

/**
 * Class MaterialOptimizer
 * Provides suggestions for sustainable construction materials.
 */
class MaterialOptimizer
{
    /**
     * Suggests materials based on the selected materials, cost, and environmental impact.
     *
     * @param array $materials The selected materials.
     * @param float $budget The budget for the project.
     * @param float $area The area in square feet that needs to be covered.
     * @param float $environmentalImpactThreshold The maximum allowed environmental impact score.
     * @return array The suggested materials and total costs.
     */
    public function suggestMaterials(array $materials, float $budget, float $area, float $environmentalImpactThreshold): array
    {
        $suggestions = [];

        foreach ($materials as $material) {
            if ($material->environmentalImpactScore <= $environmentalImpactThreshold) {
                $totalCost = $material->calculateCostForArea($area);
                if ($totalCost <= $budget) {
                    $suggestions[] = [
                        'material' => $material,
                        'totalCost' => $totalCost
                    ];
                }
            }
        }

        return $suggestions;
    }
}
