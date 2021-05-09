<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210507152731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_user DROP INDEX UNIQ_92589AE2FD02F13, ADD INDEX IDX_92589AE2FD02F13 (evenement_id)');
        $this->addSql('ALTER TABLE event_user DROP FOREIGN KEY FK_92589AE29D86650F');
        $this->addSql('DROP INDEX UNIQ_92589AE29D86650F ON event_user');
        $this->addSql('ALTER TABLE event_user CHANGE user_id_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_user ADD CONSTRAINT FK_92589AE267B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_92589AE267B3B43D ON event_user (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_user DROP INDEX IDX_92589AE2FD02F13, ADD UNIQUE INDEX UNIQ_92589AE2FD02F13 (evenement_id)');
        $this->addSql('ALTER TABLE event_user DROP FOREIGN KEY FK_92589AE267B3B43D');
        $this->addSql('DROP INDEX IDX_92589AE267B3B43D ON event_user');
        $this->addSql('ALTER TABLE event_user CHANGE users_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_user ADD CONSTRAINT FK_92589AE29D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92589AE29D86650F ON event_user (user_id_id)');
    }
}
