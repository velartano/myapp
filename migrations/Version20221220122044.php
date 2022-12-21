<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221220122044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD biens_id INT NOT NULL');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC3867773350C FOREIGN KEY (biens_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_45EDC3867773350C ON bien (biens_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3867773350C');
        $this->addSql('DROP INDEX IDX_45EDC3867773350C ON bien');
        $this->addSql('ALTER TABLE bien DROP biens_id');
    }
}
