<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511133941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED89348A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2ED89348A76ED395 ON conge (user_id)');
        $this->addSql('ALTER TABLE user CHANGE salaire salaire INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED89348A76ED395');
        $this->addSql('DROP INDEX IDX_2ED89348A76ED395 ON conge');
        $this->addSql('ALTER TABLE conge CHANGE user_id user_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE salaire salaire DOUBLE PRECISION NOT NULL');
    }
}
