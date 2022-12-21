<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221220123348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD biens_id INT NOT NULL, ADD bien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC3867773350C FOREIGN KEY (biens_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386BD95B80F FOREIGN KEY (bien_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_45EDC3867773350C ON bien (biens_id)');
        $this->addSql('CREATE INDEX IDX_45EDC386BD95B80F ON bien (bien_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3867773350C');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386BD95B80F');
        $this->addSql('DROP INDEX IDX_45EDC3867773350C ON bien');
        $this->addSql('DROP INDEX IDX_45EDC386BD95B80F ON bien');
        $this->addSql('ALTER TABLE bien DROP biens_id, DROP bien_id');
    }
}
