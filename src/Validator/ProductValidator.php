<?php

declare(strict_types=1);

namespace App\Validator;

final class ProductValidator
{
    public function validate(string $title, string $description, string $price)
    {
        $errors = [];

        if (mb_strlen($title) <= 3) {
            $errors['title'] = 'Название должно быть длиннее 3 символов';
        } elseif (mb_strlen($title) >= 50) {
            $errors['title'] = 'Название должно быть короче 50 символов';
        }
        if (mb_strlen($description) <= 3) {
            $errors['description'] = 'Описание должно быть длиннее 3 символов';
        } elseif (mb_strlen($description) >= 250) {
            $errors['description'] = 'Описание должно быть короче 250 символов';
        }
        if (!is_numeric($price)) {
            $errors['price'] = 'Цена должна быть числом';
        } else {
            $priceFloat = (float) $price;
            if ($priceFloat < 0) {
                $errors['price'] = 'Цена не может быть отрицательной';
            } elseif ($priceFloat == 0) {
                $errors['price'] = 'Цена не может быть нулевой';
            }
        }
        return $errors;
    }
}
