<?php

namespace App;

/**
 * Class Material
 * Represents a construction material with its properties and units.
 */
class Material
{
    public function __construct(
        public string $name,
        public float $costPerUnit,
        public float $environmentalImpactScore,
        public string $availabilityRegion,
        public string $unit,
        public float $coveragePerSqFt  // Amount of material needed to cover 1 square foot
    ) {}

    /**
     * Displays basic information about the material.
     *
     * @return string
     */
    public function displayInfo(): string
    {
        return "{$this->name} - Cost: \${$this->costPerUnit}/{$this->unit}, Environmental Impact: {$this->environmentalImpactScore}, Available in: {$this->availabilityRegion}";
    }

    /**
     * Calculates the total cost based on the area to cover and the material coverage rate.
     *
     * @param float $area The area to cover in square feet.
     * @return float The total cost for the given area.
     */
    public function calculateCostForArea(float $area): float
    {
        $materialNeeded = $area * $this->coveragePerSqFt;
        return $materialNeeded * $this->costPerUnit;
    }
}
