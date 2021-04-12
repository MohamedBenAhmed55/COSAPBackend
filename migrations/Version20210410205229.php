<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210410205229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA1272B747');
        $this->addSql('DROP INDEX IDX_BF5476CA1272B747 ON notification');
        $this->addSql('ALTER TABLE notification DROP id_user_emmetteur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification ADD id_user_emmetteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1272B747 FOREIGN KEY (id_user_emmetteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CA1272B747 ON notification (id_user_emmetteur_id)');
    }
}
