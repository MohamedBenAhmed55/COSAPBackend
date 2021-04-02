<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324171350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autorisation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, company_id INT DEFAULT NULL, date_deb DATE NOT NULL, heure_deb TIME NOT NULL, heure_fin TIME NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_9A43134A76ED395 (user_id), INDEX IDX_9A43134979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chef_groupe (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_17DC5A979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postalcode VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, matricule_fiscale VARCHAR(255) NOT NULL, secteur_activite VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conge (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, company_id INT DEFAULT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, date_reprise DATE DEFAULT NULL, type VARCHAR(255) NOT NULL, is_half_day TINYINT(1) DEFAULT NULL, is_validated TINYINT(1) DEFAULT NULL, INDEX IDX_2ED89348A76ED395 (user_id), INDEX IDX_2ED89348979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, chef_id INT DEFAULT NULL, company_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_4B98C21150A48F1 (chef_id), INDEX IDX_4B98C21979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE heures_travail (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, heure_deb TIME NOT NULL, heure_fin TIME NOT NULL, heure_deb_pause TIME NOT NULL, heure_fin_pause TIME NOT NULL, is_seance_unique TINYINT(1) NOT NULL, INDEX IDX_1847E8C8979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jours_feries (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, date DATE NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_9B22B9FC979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, id_user_emmetteur_id INT DEFAULT NULL, id_user_recepteur_id INT DEFAULT NULL, date_notif DATE NOT NULL, description VARCHAR(255) NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_BF5476CA1272B747 (id_user_emmetteur_id), INDEX IDX_BF5476CA4AB26C38 (id_user_recepteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_7C890FAB979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, etage INT NOT NULL, INDEX IDX_4E977E5C979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, user_destinataire_id INT DEFAULT NULL, company_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, date_deb DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, priorite VARCHAR(255) NOT NULL, is_validated TINYINT(1) NOT NULL, INDEX IDX_93872075B62423E1 (user_destinataire_id), INDEX IDX_93872075979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, groupe_id INT DEFAULT NULL, poste_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cin VARCHAR(8) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_nai DATE NOT NULL, date_embauche DATE NOT NULL, genre VARCHAR(1) NOT NULL, adresse VARCHAR(255) NOT NULL, salaire DOUBLE PRECISION NOT NULL, phone VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, etat_presence VARCHAR(255) DEFAULT NULL, matricule VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649979B1AD6 (company_id), INDEX IDX_8D93D6497A45358C (groupe_id), UNIQUE INDEX UNIQ_8D93D649A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE autorisation ADD CONSTRAINT FK_9A43134A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE autorisation ADD CONSTRAINT FK_9A43134979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE chef_groupe ADD CONSTRAINT FK_17DC5A979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED89348A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED89348979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21150A48F1 FOREIGN KEY (chef_id) REFERENCES chef_groupe (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE heures_travail ADD CONSTRAINT FK_1847E8C8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE jours_feries ADD CONSTRAINT FK_9B22B9FC979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1272B747 FOREIGN KEY (id_user_emmetteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA4AB26C38 FOREIGN KEY (id_user_recepteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FAB979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075B62423E1 FOREIGN KEY (user_destinataire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21150A48F1');
        $this->addSql('ALTER TABLE autorisation DROP FOREIGN KEY FK_9A43134979B1AD6');
        $this->addSql('ALTER TABLE chef_groupe DROP FOREIGN KEY FK_17DC5A979B1AD6');
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED89348979B1AD6');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21979B1AD6');
        $this->addSql('ALTER TABLE heures_travail DROP FOREIGN KEY FK_1847E8C8979B1AD6');
        $this->addSql('ALTER TABLE jours_feries DROP FOREIGN KEY FK_9B22B9FC979B1AD6');
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FAB979B1AD6');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C979B1AD6');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497A45358C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A0905086');
        $this->addSql('ALTER TABLE autorisation DROP FOREIGN KEY FK_9A43134A76ED395');
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED89348A76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA1272B747');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA4AB26C38');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075B62423E1');
        $this->addSql('DROP TABLE autorisation');
        $this->addSql('DROP TABLE chef_groupe');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE conge');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE heures_travail');
        $this->addSql('DROP TABLE jours_feries');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE user');
    }
}
