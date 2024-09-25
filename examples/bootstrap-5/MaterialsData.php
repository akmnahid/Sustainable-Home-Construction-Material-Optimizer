<?php

require '../../vendor/autoload.php';

use App\DataProvider;
use App\Material;

/**
 * MaterialsData implements DataProvider interface
 * Provides a list of materials, all measured in square feet.
 */
class MaterialsData implements DataProvider
{
    /**
     * Returns an array of Material objects.
     *
     * @return Material[]
     */
    public function getMaterials(): array
    {
        return [
            new Material('Bamboo', 20, 30, 'Asia', 'per square foot', 1),  // Bamboo covers 1 sq ft per unit
            new Material('Cork', 15, 25, 'Europe', 'per square foot', 1),  // Cork covers 1 sq ft per unit
            new Material('Recycled Steel', 50, 40, 'Global', 'per square foot', 1),  // Recycled steel covers 1 sq ft
            new Material('Reclaimed Wood', 35, 20, 'North America', 'per square foot', 1),  // Wood covers 1 sq ft
            new Material('Hempcrete', 10, 15, 'Global', 'per square foot', 1)  // Hempcrete covers 1 sq ft
        ];
    }
}
