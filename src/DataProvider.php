<?php

namespace App;

/**
 * Interface DataProvider
 * Defines the contract for any data provider to supply materials.
 */
interface DataProvider
{
    /**
     * Should return an array of Material objects.
     *
     * @return Material[]
     */
    public function getMaterials(): array;
}
