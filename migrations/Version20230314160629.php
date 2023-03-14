<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314160629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE info_client (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail_pro VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_pro INT NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, num_siret INT NOT NULL, INDEX IDX_A995B0379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE info_client ADD CONSTRAINT FK_A995B0379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_client DROP FOREIGN KEY FK_A995B0379F37AE5');
        $this->addSql('DROP TABLE info_client');
    }
}
