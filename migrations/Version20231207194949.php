<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207194949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arriver (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, influe_id INT DEFAULT NULL, libelle LONGTEXT DEFAULT NULL, explication LONGTEXT DEFAULT NULL, source LONGTEXT DEFAULT NULL, INDEX IDX_4F488091FD02F13 (evenement_id), INDEX IDX_4F488091E032538A (influe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, arriver_id INT DEFAULT NULL, libelle LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_B26681E273E1164 (arriver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE influe (id INT AUTO_INCREMENT NOT NULL, change_points INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nom_statistique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partie (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, arrivers_id INT DEFAULT NULL, score INT DEFAULT NULL, INDEX IDX_59B1F3DFB88E14F (utilisateur_id), INDEX IDX_59B1F3DAD892675 (arrivers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistique (id INT AUTO_INCREMENT NOT NULL, se_nomme_id INT DEFAULT NULL, partie_id INT DEFAULT NULL, influe_id INT DEFAULT NULL, points INT DEFAULT NULL, INDEX IDX_73A038AD6ECDFE63 (se_nomme_id), INDEX IDX_73A038ADE075F7A4 (partie_id), INDEX IDX_73A038ADE032538A (influe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091E032538A FOREIGN KEY (influe_id) REFERENCES influe (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E273E1164 FOREIGN KEY (arriver_id) REFERENCES arriver (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DAD892675 FOREIGN KEY (arrivers_id) REFERENCES arriver (id)');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038AD6ECDFE63 FOREIGN KEY (se_nomme_id) REFERENCES nom_statistique (id)');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADE075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id)');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADE032538A FOREIGN KEY (influe_id) REFERENCES influe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091FD02F13');
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091E032538A');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E273E1164');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DFB88E14F');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DAD892675');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038AD6ECDFE63');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038ADE075F7A4');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038ADE032538A');
        $this->addSql('DROP TABLE arriver');
        $this->addSql('DROP TABLE choix');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE influe');
        $this->addSql('DROP TABLE nom_statistique');
        $this->addSql('DROP TABLE partie');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
