<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116140222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frais_forfait ADD proprietaire VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE cp cp SMALLINT(5) NOT NULL');
        $this->addSql('ALTER TABLE vehicules MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicules DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vehicules CHANGE id id INT NOT NULL, CHANGE usernane usernane VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE vehicules ADD PRIMARY KEY (usernane)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frais_forfait DROP proprietaire');
        $this->addSql('ALTER TABLE user CHANGE cp cp INT(5) NOT NULL');
        $this->addSql('ALTER TABLE vehicules MODIFY usernane VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE vehicules DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vehicules CHANGE usernane usernane VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE vehicules ADD PRIMARY KEY (id)');
    }
}
