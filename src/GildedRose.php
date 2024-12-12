<?php

namespace App;

use App\QualityUpdateStrategy\QualityStrategyFactory;

final class GildedRose
{
    public function updateQuality($item)
    {
        QualityStrategyFactory::createStrategy($item->name)->updateQualityAndSellIn($item);
    }

}