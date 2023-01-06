<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221223203735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, nom_admin VARCHAR (255) NOT NULL, prenom_admin VARCHAR (255) NOT NULL, email VARCHAR (255) NOT NULL, login VARCHAR (255) NOT NULL, password VARCHAR (255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
       
       $this->addSql('CREATE TABLE bien_immobilier (
        id INT AUTO_INCREMENT NOT NULL, 
        titre VARCHAR (255) NOT NULL, 
        prix INT NOT NULL, 
        image VARCHAR(255) , 
        code_postal INT NOT NULL,
        description VARCHAR(255), 
        ville VARCHAR(255), 
        surface VARCHAR(255), 
        categorie_id INT, 
        PRIMARY KEY(id)) 
        DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');


        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, type_cat VARCHAR (255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bien_immobilier');
        $this->addSql('DROP TABLE categorie');
    }
}