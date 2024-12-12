<?php

namespace App\QualityUpdateStrategy;

class QualityStrategyFactory
{
    static function createStrategy(string $item_name): QualityUpdateStrategyInterface
    {
        switch ($item_name) {
            case 'Aged Brie':
                return new IncreasingQualityStrategy();
            case 'Sulfuras, Hand of Ragnaros':
                return new LegendaryQualityStrategy();
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new CustomBackstagePassesQualityStrategy();
            default:
                return new DecreasingQualityStrategy();
        }
    }
}