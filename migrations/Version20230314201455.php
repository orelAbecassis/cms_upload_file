<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314201455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fichier_client (id INT AUTO_INCREMENT NOT NULL, id_fichier_demande_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, date_fichier DATETIME NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_EF71E57FF3E07336 (id_fichier_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier_client_info_client (fichier_client_id INT NOT NULL, info_client_id INT NOT NULL, INDEX IDX_A89C58013DE7ACB1 (fichier_client_id), INDEX IDX_A89C5801B49BD41C (info_client_id), PRIMARY KEY(fichier_client_id, info_client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier_demande (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, INDEX IDX_FD072B9279F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_client (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail_pro VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_pro INT NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, num_siret INT NOT NULL, INDEX IDX_A995B0379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fichier_client ADD CONSTRAINT FK_EF71E57FF3E07336 FOREIGN KEY (id_fichier_demande_id) REFERENCES fichier_demande (id)');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C58013DE7ACB1 FOREIGN KEY (fichier_client_id) REFERENCES fichier_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C5801B49BD41C FOREIGN KEY (info_client_id) REFERENCES info_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_demande ADD CONSTRAINT FK_FD072B9279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE info_client ADD CONSTRAINT FK_A995B0379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_client DROP FOREIGN KEY FK_EF71E57FF3E07336');
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C58013DE7ACB1');
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C5801B49BD41C');
        $this->addSql('ALTER TABLE fichier_demande DROP FOREIGN KEY FK_FD072B9279F37AE5');
        $this->addSql('ALTER TABLE info_client DROP FOREIGN KEY FK_A995B0379F37AE5');
        $this->addSql('DROP TABLE fichier_client');
        $this->addSql('DROP TABLE fichier_client_info_client');
        $this->addSql('DROP TABLE fichier_demande');
        $this->addSql('DROP TABLE info_client');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
