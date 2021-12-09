<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209134635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_frais (id INT AUTO_INCREMENT NOT NULL, mois DATETIME NOT NULL, nb_justificatif VARCHAR(5) NOT NULL, montant_valide VARCHAR(6) NOT NULL, date_modif DATETIME NOT NULL, etat VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_forfait (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, montant VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_hors_forfait (id INT AUTO_INCREMENT NOT NULL, mois DATETIME NOT NULL, montant VARCHAR(6) NOT NULL, libelle VARCHAR(50) NOT NULL, dates DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicules (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(15) NOT NULL, modele VARCHAR(15) NOT NULL, immatriculation VARCHAR(9) NOT NULL, carburant VARCHAR(15) NOT NULL, chevaux_fiscaux INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fiche_frais');
        $this->addSql('DROP TABLE frais_forfait');
        $this->addSql('DROP TABLE frais_hors_forfait');
        $this->addSql('DROP TABLE vehicules');
    }
}
