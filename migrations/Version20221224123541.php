<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221224123541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE safer');
        $this->addSql('ALTER TABLE bien_immobilier ADD description VARCHAR(200) NOT NULL, ADD localisation VARCHAR(25) NOT NULL, ADD surface VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE safer (Référence VARCHAR(15) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Intitulé VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Descriptif VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Localisation VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Surface VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Prix VARCHAR(15) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Type VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, Catégorie VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(Référence)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bien_immobilier DROP description, DROP localisation, DROP surface');
    }
}
