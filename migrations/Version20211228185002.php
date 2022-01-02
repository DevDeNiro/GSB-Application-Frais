<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228185002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, pseudo VARCHAR(50) NOT NULL, cp SMALLINT NOT NULL, ville VARCHAR(50) NOT NULL, date_embauche DATETIME NOT NULL, profil VARCHAR(1) NOT NULL, adresse VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE frais_forfait DROP repas_midi, DROP nuit, DROP etape, DROP km, CHANGE libelle libelle VARCHAR(50) NOT NULL, CHANGE montant montant VARCHAR(6) NOT NULL');
        $this->addSql('ALTER TABLE frais_hors_forfait CHANGE montant montant VARCHAR(6) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE frais_forfait ADD repas_midi INT NOT NULL, ADD nuit INT NOT NULL, ADD etape INT NOT NULL, ADD km INT NOT NULL, CHANGE libelle libelle VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE montant montant VARCHAR(6) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE frais_hors_forfait CHANGE montant montant INT NOT NULL');
    }
}
