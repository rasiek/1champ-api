<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128140826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE organizer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE player_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE single_match_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE team_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tournoi_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE organizer (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE player (id INT NOT NULL, team_id INT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, level INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98197A65296CD8AE ON player (team_id)');
        $this->addSql('CREATE TABLE single_match (id INT NOT NULL, team_a_id INT NOT NULL, team_b_id INT NOT NULL, result_team_a VARCHAR(255) DEFAULT NULL, result_team_b VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EBDFBBF4EA3FA723 ON single_match (team_a_id)');
        $this->addSql('CREATE INDEX IDX_EBDFBBF4F88A08CD ON single_match (team_b_id)');
        $this->addSql('CREATE TABLE team (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tournoi (id INT NOT NULL, organizer_id INT NOT NULL, name VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, game VARCHAR(255) NOT NULL, players_qty INT NOT NULL, fields_qty INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_18AFD9DF876C4DDA ON tournoi (organizer_id)');
        $this->addSql('CREATE TABLE tournoi_team (tournoi_id INT NOT NULL, team_id INT NOT NULL, PRIMARY KEY(tournoi_id, team_id))');
        $this->addSql('CREATE INDEX IDX_99034A9BF607770A ON tournoi_team (tournoi_id)');
        $this->addSql('CREATE INDEX IDX_99034A9B296CD8AE ON tournoi_team (team_id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE single_match ADD CONSTRAINT FK_EBDFBBF4EA3FA723 FOREIGN KEY (team_a_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE single_match ADD CONSTRAINT FK_EBDFBBF4F88A08CD FOREIGN KEY (team_b_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF876C4DDA FOREIGN KEY (organizer_id) REFERENCES organizer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tournoi_team ADD CONSTRAINT FK_99034A9BF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tournoi_team ADD CONSTRAINT FK_99034A9B296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tournoi DROP CONSTRAINT FK_18AFD9DF876C4DDA');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A65296CD8AE');
        $this->addSql('ALTER TABLE single_match DROP CONSTRAINT FK_EBDFBBF4EA3FA723');
        $this->addSql('ALTER TABLE single_match DROP CONSTRAINT FK_EBDFBBF4F88A08CD');
        $this->addSql('ALTER TABLE tournoi_team DROP CONSTRAINT FK_99034A9B296CD8AE');
        $this->addSql('ALTER TABLE tournoi_team DROP CONSTRAINT FK_99034A9BF607770A');
        $this->addSql('DROP SEQUENCE organizer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE player_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE single_match_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE team_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tournoi_id_seq CASCADE');
        $this->addSql('DROP TABLE organizer');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE single_match');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE tournoi_team');
    }
}
