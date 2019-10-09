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
final class Version20190718212506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page CHANGE main_image2 main_image2 VARCHAR(255) DEFAULT NULL, CHANGE main_image3 main_image3 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page CHANGE main_image2 main_image2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE main_image3 main_image3 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
