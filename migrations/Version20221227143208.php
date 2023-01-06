<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221227143208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR (255) NOT NULL, nom VARCHAR (255) NOT NULL, prenom VARCHAR (255) NOT NULL, numero INT NOT NULL, content VARCHAR (255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE safer (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(15) NOT NULL, intitule VARCHAR(200) NOT NULL, descriptif VARCHAR(200) NOT NULL, localisation VARCHAR(15) NOT NULL, surface VARCHAR (255) NOT NULL, prix VARCHAR(200) NOT NULL, type VARCHAR(40) NOT NULL, categorie VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE bien_immobilier ADD description VARCHAR(200) NOT NULL, ADD localisation VARCHAR(25) NOT NULL, ADD surface VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        // $this->addSql('DROP TABLE safer');
        $this->addSql('ALTER TABLE bien_immobilier DROP description, DROP localisation, DROP surface');
    }
}