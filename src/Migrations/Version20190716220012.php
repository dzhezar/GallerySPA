<?php

declare(strict_types=1);

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716220012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page ADD about_me LONGTEXT DEFAULT NULL, DROP about_lina, DROP about_katya');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page ADD about_lina LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci, ADD about_katya LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci, DROP about_me');
    }
}
