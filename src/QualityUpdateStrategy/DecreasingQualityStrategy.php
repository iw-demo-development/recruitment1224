<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class DecreasingQualityStrategy extends AbstractQualityUpdateStrategy
{
    public function updateQualityAndSellIn(Item $item): Item
    {
        if ($this->canQualityDecrease($item)) {
            $item->quality -= $this->calculateQualityModifier($item);
        } elseif ($item->quality > $this->min_quality) {
            $item->quality = $this->min_quality;
        }

        $item->sell_in--;

        return $item;
    }
}