<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230328120314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail_pro VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_pro INT NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, num_siret INT NOT NULL, INDEX IDX_C82E7479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichiers (id INT AUTO_INCREMENT NOT NULL, id_fichier_demande_id INT DEFAULT NULL, nom_fichier VARCHAR(255) NOT NULL, date_fichier DATETIME NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_969DB4ABF3E07336 (id_fichier_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichiers_clients (fichiers_id INT NOT NULL, clients_id INT NOT NULL, INDEX IDX_A823884DBD7BF362 (fichiers_id), INDEX IDX_A823884DAB014612 (clients_id), PRIMARY KEY(fichiers_id, clients_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E7479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fichiers ADD CONSTRAINT FK_969DB4ABF3E07336 FOREIGN KEY (id_fichier_demande_id) REFERENCES fichier_demande (id)');
        $this->addSql('ALTER TABLE fichiers_clients ADD CONSTRAINT FK_A823884DBD7BF362 FOREIGN KEY (fichiers_id) REFERENCES fichiers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichiers_clients ADD CONSTRAINT FK_A823884DAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_client DROP FOREIGN KEY FK_EF71E57FF3E07336');
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C5801B49BD41C');
        $this->addSql('ALTER TABLE fichier_client_info_client DROP FOREIGN KEY FK_A89C58013DE7ACB1');
        $this->addSql('ALTER TABLE info_client DROP FOREIGN KEY FK_A995B0379F37AE5');
        $this->addSql('DROP TABLE fichier_client');
        $this->addSql('DROP TABLE fichier_client_info_client');
        $this->addSql('DROP TABLE info_client');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fichier_client (id INT AUTO_INCREMENT NOT NULL, id_fichier_demande_id INT DEFAULT NULL, nom_fichier VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_fichier DATETIME NOT NULL, path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_EF71E57FF3E07336 (id_fichier_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fichier_client_info_client (fichier_client_id INT NOT NULL, info_client_id INT NOT NULL, INDEX IDX_A89C5801B49BD41C (info_client_id), INDEX IDX_A89C58013DE7ACB1 (fichier_client_id), PRIMARY KEY(fichier_client_id, info_client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE info_client (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail_pro VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_societe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_pro INT NOT NULL, cp INT NOT NULL, ville VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_siret INT NOT NULL, INDEX IDX_A995B0379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fichier_client ADD CONSTRAINT FK_EF71E57FF3E07336 FOREIGN KEY (id_fichier_demande_id) REFERENCES fichier_demande (id)');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C5801B49BD41C FOREIGN KEY (info_client_id) REFERENCES info_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_client_info_client ADD CONSTRAINT FK_A89C58013DE7ACB1 FOREIGN KEY (fichier_client_id) REFERENCES fichier_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_client ADD CONSTRAINT FK_A995B0379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E7479F37AE5');
        $this->addSql('ALTER TABLE fichiers DROP FOREIGN KEY FK_969DB4ABF3E07336');
        $this->addSql('ALTER TABLE fichiers_clients DROP FOREIGN KEY FK_A823884DBD7BF362');
        $this->addSql('ALTER TABLE fichiers_clients DROP FOREIGN KEY FK_A823884DAB014612');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE fichiers');
        $this->addSql('DROP TABLE fichiers_clients');
    }
}
