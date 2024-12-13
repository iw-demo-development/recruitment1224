<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class LegendaryQualityStrategy extends AbstractQualityUpdateStrategy
{
    protected int $max_quality = 80;

    public function updateQualityAndSellIn(Item $item): Item
    {
        //Following check can be skipped, but it ensures that the quality of legendary item is always at maximum
        if ($item->quality != $this->max_quality) {
            $item->quality = $this->max_quality;
        }

        return $item;
    }
}