<?php

namespace App\QualityUpdateStrategy;

use App\Item;

abstract class AbstractQualityUpdateStrategy implements QualityUpdateStrategyInterface
{
    protected int $min_quality = 0;
    protected int $max_quality = 50;
    protected int $quality_modifier = 1;
    protected int $quality_post_sell_multiplier = 2;
    protected int $sell_in_threshold= 0;

    protected function canQualityIncrease(Item $item): bool
    {
        return ($this->max_quality - $item->quality) >= $this->calculateQualityModifier($item);
    }

    protected function canQualityDecrease(Item $item): bool
    {
        return ($item->quality - $this->min_quality) >= $this->calculateQualityModifier($item);
    }

    protected function isSellInLimitReached(Item $item): bool
    {
        return $this->sell_in_threshold >= $item->sell_in;
    }

    protected function calculateQualityModifier(Item $item): int
    {
        return $this->isSellInLimitReached($item) ? $this->quality_modifier * $this->quality_post_sell_multiplier : $this->quality_modifier;
    }
}