<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190513080326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trophies (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE payment_type');
        $this->addSql('ALTER TABLE events ADD event_id INT NOT NULL, ADD event_type_id INT NOT NULL, ADD trophies_id INT NOT NULL, DROP id_events, DROP user_id_user, DROP event_type, DROP trophies_id_trophies');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A71F7E88B FOREIGN KEY (event_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A401B253C FOREIGN KEY (event_type_id) REFERENCES event_type (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574ADEB0ADA0 FOREIGN KEY (trophies_id) REFERENCES trophies (id)');
        $this->addSql('CREATE INDEX IDX_5387574A71F7E88B ON events (event_id)');
        $this->addSql('CREATE INDEX IDX_5387574A401B253C ON events (event_type_id)');
        $this->addSql('CREATE INDEX IDX_5387574ADEB0ADA0 ON events (trophies_id)');
        $this->addSql('ALTER TABLE event_type DROP id_event_type');
        $this->addSql('ALTER TABLE handicap_index ADD score_id INT NOT NULL');
        $this->addSql('ALTER TABLE handicap_index ADD CONSTRAINT FK_9F88794412EB0A51 FOREIGN KEY (score_id) REFERENCES score (id)');
        $this->addSql('CREATE INDEX IDX_9F88794412EB0A51 ON handicap_index (score_id)');
        $this->addSql('ALTER TABLE membership DROP id_membership, DROP users_id_users');
        $this->addSql('ALTER TABLE payment ADD membership_id INT NOT NULL, DROP id_payment, DROP membership_id_membership');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D1FB354CD FOREIGN KEY (membership_id) REFERENCES membership (id)');
        $this->addSql('CREATE INDEX IDX_6D28840D1FB354CD ON payment (membership_id)');
        $this->addSql('ALTER TABLE score DROP id_score, DROP handicap, DROP id_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574ADEB0ADA0');
        $this->addSql('CREATE TABLE payment_type (id INT AUTO_INCREMENT NOT NULL, id_payment_type INT NOT NULL, payment_id_payment INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE trophies');
        $this->addSql('ALTER TABLE event_type ADD id_event_type INT NOT NULL');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A71F7E88B');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A401B253C');
        $this->addSql('DROP INDEX IDX_5387574A71F7E88B ON events');
        $this->addSql('DROP INDEX IDX_5387574A401B253C ON events');
        $this->addSql('DROP INDEX IDX_5387574ADEB0ADA0 ON events');
        $this->addSql('ALTER TABLE events ADD id_events INT NOT NULL, ADD user_id_user INT NOT NULL, ADD event_type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD trophies_id_trophies INT NOT NULL, DROP event_id, DROP event_type_id, DROP trophies_id');
        $this->addSql('ALTER TABLE handicap_index DROP FOREIGN KEY FK_9F88794412EB0A51');
        $this->addSql('DROP INDEX IDX_9F88794412EB0A51 ON handicap_index');
        $this->addSql('ALTER TABLE handicap_index DROP score_id');
        $this->addSql('ALTER TABLE membership ADD id_membership INT NOT NULL, ADD users_id_users INT NOT NULL');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D1FB354CD');
        $this->addSql('DROP INDEX IDX_6D28840D1FB354CD ON payment');
        $this->addSql('ALTER TABLE payment ADD membership_id_membership INT NOT NULL, CHANGE membership_id id_payment INT NOT NULL');
        $this->addSql('ALTER TABLE score ADD id_score INT NOT NULL, ADD handicap INT DEFAULT NULL, ADD id_user INT NOT NULL');
    }
}
