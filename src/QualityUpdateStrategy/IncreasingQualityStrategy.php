<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class IncreasingQualityStrategy extends AbstractQualityUpdateStrategy
{
    public function updateQualityAndSellIn(Item $item): Item
    {
        if ($this->canQualityIncrease($item)) {
            $item->quality += $this->calculateQualityModifier($item);
        } elseif ($item->quality < $this->max_quality) {
            $item->quality = $this->max_quality;
        }

        $item->sell_in--;

        return $item;
    }
}