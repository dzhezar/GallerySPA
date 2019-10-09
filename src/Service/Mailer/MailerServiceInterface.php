<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\Mailer;

interface MailerServiceInterface
{
    public function mail(string $name, string $email, string $text);
}
