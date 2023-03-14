<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314162834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_client ADD id_fichier_demande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fichier_client ADD CONSTRAINT FK_EF71E57FF3E07336 FOREIGN KEY (id_fichier_demande_id) REFERENCES fichier_demande (id)');
        $this->addSql('CREATE INDEX IDX_EF71E57FF3E07336 ON fichier_client (id_fichier_demande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_client DROP FOREIGN KEY FK_EF71E57FF3E07336');
        $this->addSql('DROP INDEX IDX_EF71E57FF3E07336 ON fichier_client');
        $this->addSql('ALTER TABLE fichier_client DROP id_fichier_demande_id');
    }
}
