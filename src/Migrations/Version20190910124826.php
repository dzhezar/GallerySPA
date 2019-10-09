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
final class Version20190910124826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE photoshoot DROP backstage');
        $this->addSql('ALTER TABLE photoshoot_image ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photoshoot_image ADD CONSTRAINT FK_8DA99ED012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8DA99ED012469DE2 ON photoshoot_image (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE photoshoot ADD backstage TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE photoshoot_image DROP FOREIGN KEY FK_8DA99ED012469DE2');
        $this->addSql('DROP INDEX IDX_8DA99ED012469DE2 ON photoshoot_image');
        $this->addSql('ALTER TABLE photoshoot_image DROP category_id');
    }
}
