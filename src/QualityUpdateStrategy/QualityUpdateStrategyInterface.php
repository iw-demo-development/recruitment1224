<?php

namespace App\QualityUpdateStrategy;

use App\Item;

interface QualityUpdateStrategyInterface
{
    public function updateQualityAndSellIn(Item $item): Item;
}