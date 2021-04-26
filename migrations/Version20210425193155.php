<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425193155 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chef_groupe ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chef_groupe ADD CONSTRAINT FK_17DC5A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17DC5A9D86650F ON chef_groupe (user_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chef_groupe DROP FOREIGN KEY FK_17DC5A9D86650F');
        $this->addSql('DROP INDEX UNIQ_17DC5A9D86650F ON chef_groupe');
        $this->addSql('ALTER TABLE chef_groupe DROP user_id_id');
    }
}
