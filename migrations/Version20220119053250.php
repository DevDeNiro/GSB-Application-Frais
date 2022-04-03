<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119053250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frais_forfait ADD etat VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE frais_hors_forfait ADD etat VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE cp cp SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frais_forfait DROP etat');
        $this->addSql('ALTER TABLE frais_hors_forfait DROP etat');
        $this->addSql('ALTER TABLE user CHANGE cp cp INT NOT NULL');
    }
}
