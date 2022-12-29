<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229033446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE bien_immobilier ADD category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bien_immobilier ADD CONSTRAINT FK_D1BE34E19777D11E FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_D1BE34E19777D11E ON bien_immobilier (category_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('ALTER TABLE bien_immobilier DROP FOREIGN KEY FK_D1BE34E19777D11E');
        $this->addSql('DROP INDEX IDX_D1BE34E19777D11E ON bien_immobilier');
        $this->addSql('ALTER TABLE bien_immobilier DROP category_id_id');
    }
}
