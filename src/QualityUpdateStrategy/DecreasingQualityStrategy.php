<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class DecreasingQualityStrategy extends AbstractQualityUpdateStrategy
{
    public function updateQualityAndSellIn(Item $item): Item
    {
        if ($this->canQualityDecrease($item)) {
            $item->quality -= $this->calculateQualityModifier($item);
        } else {
            $item->quality = $this->min_quality;
        }

        $item->sell_in--;

        return $item;
    }
}