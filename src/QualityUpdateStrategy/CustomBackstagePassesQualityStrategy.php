<?php

namespace App\QualityUpdateStrategy;

use App\Item;

class CustomBackstagePassesQualityStrategy extends AbstractQualityUpdateStrategy
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

    protected function calculateQualityModifier(Item $item): int
    {
        switch (true) {
            case ($item->sell_in <= 0):
                return -$item->quality;
            case ($item->sell_in <= 5):
                return 3;
            case ($item->sell_in <=10):
                return 2;
            default:
                return 1;
        }
    }
}