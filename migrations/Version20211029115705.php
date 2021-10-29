<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029115705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprietaire ADD proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD CONSTRAINT FK_69E399D676C50E4A FOREIGN KEY (proprietaire_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D676C50E4A ON proprietaire (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprietaire DROP FOREIGN KEY FK_69E399D676C50E4A');
        $this->addSql('DROP INDEX UNIQ_69E399D676C50E4A ON proprietaire');
        $this->addSql('ALTER TABLE proprietaire DROP proprietaire_id');
    }
}
