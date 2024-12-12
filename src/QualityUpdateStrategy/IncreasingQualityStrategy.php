<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class IncreasingQualityStrategy extends AbstractQualityUpdateStrategy
{
    public function updateQualityAndSellIn(Item $item): Item
    {
        if ($this->canQualityIncrease($item)) {
            $item->quality += $this->calculateQualityModifier($item);
        } else {
            $item->quality = $this->max_quality;
        }

        $item->sell_in--;

        return $item;
    }
}