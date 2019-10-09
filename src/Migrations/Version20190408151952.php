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
final class Version20190408151952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page ADD main_image3 VARCHAR(255) NOT NULL, ADD about_katya LONGTEXT NOT NULL, DROP about_image1, DROP about_image2, CHANGE about_us about_lina LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE main_page ADD about_us LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci, ADD about_image2 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci, DROP about_lina, DROP about_katya, CHANGE main_image3 about_image1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
