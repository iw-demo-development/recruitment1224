## SOLUTION NOTES

- To refactor the code I encapsulated different versions of algorythm for changing the quality/sell_in into separate instances of QualityStrategy. It allows for easy modification of existing strategies for products and adding new custom strategies in the future. All defined strategies extend the AbstractQualityUpdateStrategy, but that strategy implements a strategy inferface, so in case of totally different strategy being needed, it can be also easily fitted into the system as long as it satisfies the required interface. 

- The factory class hides the logic of creating instance of particular strategy - it provides one method that will determine the correct strategy depending on the name of the item, and that again makes new products with their own strategies easy to introduce.

- Because of the encapsulation of the logic into smaller pieces, that follow the SOLID principles, it is also possible to add tests to each of the new methods/strategies - I assumed it is not the task of this coding challenge so I am not adding any more tests than what was originally provided.

- I left unchanged the convention of naming of the classes/methods (cammel case) and properties (underscore), as I assume that is what the rest of the project follows.   

- I have added type definitions to the method parameters (could have been skippedd, but it's good to add them when we know what is the type of expected value and I assumed here we expect those types). 
 
***

Poniższe zadanie zostało stworzone do ćwiczenia praktycznych umiejętności refaktoryzacji kodu. 
W katalogu tests znajduje się 19 testów, które w momencie rozpoczęcia zadania wszystkie uruchamiają
się i przechodzą prawidłowo. Testy te będą podstawowym narzędziem umożliwiającym kontrolę refaktoryzowanego kodu.
Twoim zadaniem jest refaktoryzacja kodu – czyli wprowadzanie zmian, które poprawią jego jakość, nie zmieniając przy tym
logiki działania. Jakie zmiany prowadzisz, jakich wzorców lub dobrych praktyk użyjesz – zależy od Ciebie. 
Każda poprawa jakości kodu jest lepsza niż jej brak! Pamiętaj jednak, że w momencie oddawania zadania wszystkie testy 
muszą ponownie przechodzić poprawnie.

Zadanie powinno być uruchamiane w PHP 8.1. Testy jednostkowe zostały napisane z użyciem frameworka phpunit w wersji 9.5 i na takim powinny być odpalane. Opis zadania zawierający wyjaśnienie logiki biznesowej zawartej w klasie 
GildedRose.php znajduje się poniżej.

Rozwiązanie zadania powinno być na branchu GitHub i zawierać co najmniej trzy commity.

## Requirements
- composer
- php 8.1
- phpunit 9.5

## Instalation
To install dependencies run ```composer install```. To run test use ```./vendor/bin/phpunit```.

## Introduction

Hi and welcome to team Gilded Rose. As you know, we are a small inn with a
prime location in a prominent city ran by a friendly innkeeper named Allison.
We also buy and sell only the finest goods. Unfortunately, our goods are
constantly degrading in quality as they approach their sell by date. We have a
system in place that updates our inventory for us. It was developed by a
no-nonsense type named Leeroy, who has moved on to new adventures. Your task is
to add the new feature to our system so that we can begin selling a new
category of items. First an introduction to our system:

- All items have a **SellIn** value which denotes the number of days we have to
sell the item
- All items have a **Quality** value which denotes how valuable the
item is 
- At the end of each day our system lowers both values for every item

Pretty simple, right? Well this is where it gets interesting:

- Once the sell by date has passed, Quality degrades twice as fast 
- The Quality of an item is never negative 
- "**Aged Brie**" actually increases in Quality the older it gets
- The Quality of an item is never more than 50
- "**Sulfuras**", being a legendary item, never has to be sold or decreases in
Quality
- "**Backstage passes**", like aged brie, increases in Quality as it's
SellIn value approaches; Quality increases by 2 when there are 10 days or less
and by 3 when there are 5 days or less but Quality drops to 0 after the concert

Just for clarification, an item can never have its Quality increase above 50, however "Sulfuras" is a legendary 
item and as such its Quality is 80 and it never alters.
