<?php

namespace MagicDeck\Service\Builder;

use MagicDeck\Entity\Card;

class CardBuilderService
{

    public function buildCardList(\stdClass $json): array
    {
        $cardList = [];
        $colorBuilder = new ColorBuilderService();
        foreach ($json->cards as $value) {
            if (!property_exists($value, "imageUrl")) {
                continue;
            }
            if (!property_exists($value, "text")) {
                $value->text = "";
            }
            if (!property_exists($value, "manaCost")) {
                $value->manaCost = "";
            }
            $card = new Card();
            $card->setManaCost($value->manaCost);
            $card->setName($value->name);
            $card->setDescription($value->text);
            $card->setImage($value->imageUrl);
            $card->setType($value->type);
            $colorList = $colorBuilder->buildColorList($value->colors);
            $card->setColorList($colorList);
            $cardList[] = $card;
        }
        return $cardList;
    }

}