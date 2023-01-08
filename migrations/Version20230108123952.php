<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230108123952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, id_bien INT NOT NULL, email_porteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE safer');
        $this->addSql('ALTER TABLE bien_immobilier CHANGE image image VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(200) NOT NULL, CHANGE localisation localisation VARCHAR(25) NOT NULL, CHANGE surface surface VARCHAR(10) NOT NULL, CHANGE updated_at updated_at DATETIME  NULL');
        $this->addSql('ALTER TABLE contact CHANGE numero numero INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD update_at DATETIME  NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE safer (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(15) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, intitule VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, descriptif VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, localisation VARCHAR(15) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, surface VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, prix VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, type VARCHAR(40) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, categorie VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('ALTER TABLE bien_immobilier CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE localisation localisation VARCHAR(255) DEFAULT NULL, CHANGE surface surface VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE numero numero VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE message DROP update_at');
    }
}
