<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116091635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(20) NOT NULL, modele VARCHAR(20) NOT NULL, immatriculation VARCHAR(9) NOT NULL, carburant VARCHAR(15) NOT NULL, chevaux BIGINT NOT NULL, proprietaire VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE cp cp SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE vehicules MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicules DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vehicules CHANGE id id INT NOT NULL, CHANGE usernane usernane VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE vehicules ADD PRIMARY KEY (usernane)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('ALTER TABLE user CHANGE cp cp INT NOT NULL');
        $this->addSql('ALTER TABLE vehicules MODIFY usernane VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE vehicules DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vehicules CHANGE usernane usernane VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE vehicules ADD PRIMARY KEY (id)');
    }
}
