<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210518193339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21150A48F1');
        $this->addSql('DROP INDEX IDX_4B98C21150A48F1 ON groupe');
        $this->addSql('ALTER TABLE groupe DROP chef_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe ADD chef_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21150A48F1 FOREIGN KEY (chef_id) REFERENCES chef_groupe (id)');
        $this->addSql('CREATE INDEX IDX_4B98C21150A48F1 ON groupe (chef_id)');
    }
}
