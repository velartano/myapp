<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104220720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, id_bien INT NOT NULL, email_porteur VARCHAR (255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR (255) NOT NULL, description VARCHAR (255) NOT NULL, image VARCHAR (255) NOT NULL, commentaire VARCHAR (255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE bien_immobilier CHANGE image image VARCHAR (255) NOT NULL, CHANGE description description VARCHAR(200) NOT NULL, CHANGE localisation localisation VARCHAR(25) NOT NULL, CHANGE surface surface VARCHAR(255) NOT NULL');
        // $this->addSql('ALTER TABLE bien_immobilier ADD CONSTRAINT FK_D1BE34E1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        // $this->addSql('CREATE INDEX IDX_D1BE34E1BCF5E72D ON bien_immobilier (categorie_id)');
        // $this->addSql('ALTER TABLE contact CHANGE numero INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE message');
        $this->addSql('ALTER TABLE bien_immobilier DROP FOREIGN KEY FK_D1BE34E1BCF5E72D');
        $this->addSql('DROP INDEX IDX_D1BE34E1BCF5E72D ON bien_immobilier');
        $this->addSql('ALTER TABLE bien_immobilier CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE localisation localisation VARCHAR(255) DEFAULT NULL, CHANGE surface surface VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE numero numero VARCHAR(50) NOT NULL');
    }
}