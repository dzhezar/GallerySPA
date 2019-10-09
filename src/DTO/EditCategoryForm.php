<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

class EditCategoryForm
{
    private $name;
    private $is_visible;

    public function __construct(string $name = null, bool $is_visible = null)
    {
        $this->name = $name;
        $this->is_visible = $is_visible;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function IsVisible(): bool
    {
        return $this->is_visible;
    }

    public function setIsVisible(?bool $is_visible): void
    {
        $this->is_visible = $is_visible;
    }
}
