<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207210049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091E032538A');
        $this->addSql('DROP INDEX IDX_4F488091E032538A ON choix');
        $this->addSql('ALTER TABLE choix DROP influe_id');
        $this->addSql('ALTER TABLE influe ADD statistique_id INT DEFAULT NULL, ADD choix_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE influe ADD CONSTRAINT FK_882BB4E276A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id)');
        $this->addSql('ALTER TABLE influe ADD CONSTRAINT FK_882BB4E2D9144651 FOREIGN KEY (choix_id) REFERENCES choix (id)');
        $this->addSql('CREATE INDEX IDX_882BB4E276A81463 ON influe (statistique_id)');
        $this->addSql('CREATE INDEX IDX_882BB4E2D9144651 ON influe (choix_id)');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038ADE032538A');
        $this->addSql('DROP INDEX IDX_73A038ADE032538A ON statistique');
        $this->addSql('ALTER TABLE statistique DROP influe_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE influe DROP FOREIGN KEY FK_882BB4E276A81463');
        $this->addSql('ALTER TABLE influe DROP FOREIGN KEY FK_882BB4E2D9144651');
        $this->addSql('DROP INDEX IDX_882BB4E276A81463 ON influe');
        $this->addSql('DROP INDEX IDX_882BB4E2D9144651 ON influe');
        $this->addSql('ALTER TABLE influe DROP statistique_id, DROP choix_id');
        $this->addSql('ALTER TABLE statistique ADD influe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADE032538A FOREIGN KEY (influe_id) REFERENCES influe (id)');
        $this->addSql('CREATE INDEX IDX_73A038ADE032538A ON statistique (influe_id)');
        $this->addSql('ALTER TABLE choix ADD influe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091E032538A FOREIGN KEY (influe_id) REFERENCES influe (id)');
        $this->addSql('CREATE INDEX IDX_4F488091E032538A ON choix (influe_id)');
    }
}
