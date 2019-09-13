<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510131017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE handicap_index ADD score_id INT NOT NULL');
        $this->addSql('ALTER TABLE handicap_index ADD CONSTRAINT FK_9F88794412EB0A51 FOREIGN KEY (score_id) REFERENCES score (id)');
        $this->addSql('CREATE INDEX IDX_9F88794412EB0A51 ON handicap_index (score_id)');
        $this->addSql('ALTER TABLE score DROP id_score, DROP handicap, DROP id_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE handicap_index DROP FOREIGN KEY FK_9F88794412EB0A51');
        $this->addSql('DROP INDEX IDX_9F88794412EB0A51 ON handicap_index');
        $this->addSql('ALTER TABLE handicap_index DROP score_id');
        $this->addSql('ALTER TABLE score ADD id_score INT NOT NULL, ADD handicap INT DEFAULT NULL, ADD id_user INT NOT NULL');
    }
}
