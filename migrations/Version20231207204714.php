<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207204714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE explication (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, source LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choix ADD explication_id INT DEFAULT NULL, DROP explication, DROP source');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F4880917DAC56BB FOREIGN KEY (explication_id) REFERENCES explication (id)');
        $this->addSql('CREATE INDEX IDX_4F4880917DAC56BB ON choix (explication_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F4880917DAC56BB');
        $this->addSql('DROP TABLE explication');
        $this->addSql('DROP INDEX IDX_4F4880917DAC56BB ON choix');
        $this->addSql('ALTER TABLE choix ADD explication LONGTEXT DEFAULT NULL, ADD source LONGTEXT DEFAULT NULL, DROP explication_id');
    }
}
