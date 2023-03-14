<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314163155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fichier_client_info_client (fichier_client_id INT NOT NULL, info_client_id INT NOT NULL, INDEX IDX_A89C58013DE7ACB1 (fichier_client_id), INDEX IDX_A89C5801B49BD41C (info_client_id), PRIMARY KEY(fichier_client_id, info_client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C58013DE7ACB1 FOREIGN KEY (fichier_client_id) REFERENCES fichier_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C5801B49BD41C FOREIGN KEY (info_client_id) REFERENCES info_client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C58013DE7ACB1');
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C5801B49BD41C');
        $this->addSql('DROP TABLE fichier_client_info_client');
    }
}
