<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180819093229 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, assessment_id INT NOT NULL, question_id INT NOT NULL, rating_id INT NOT NULL, comment VARCHAR(2047) DEFAULT NULL, INDEX IDX_DADD4A25DD3DD5F1 (assessment_id), INDEX IDX_DADD4A251E27F6BF (question_id), INDEX IDX_DADD4A25A32EFC6 (rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(511) NOT NULL, previous SMALLINT NOT NULL, next SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, question_group_id INT NOT NULL, text VARCHAR(1023) NOT NULL, previous SMALLINT NOT NULL, next SMALLINT NOT NULL, INDEX IDX_B6F7494E9D5C694B (question_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(31) NOT NULL, option_label VARCHAR(3) NOT NULL, value SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE assessment (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, period SMALLINT NOT NULL, created_at DATETIME NOT NULL, submitted_at DATETIME NOT NULL, INDEX IDX_F7523D70296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE release_train (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, number SMALLINT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, release_train_id INT NOT NULL, name VARCHAR(32) NOT NULL, size SMALLINT NOT NULL, INDEX IDX_C4E0A61F78BC0FB1 (release_train_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25DD3DD5F1 FOREIGN KEY (assessment_id) REFERENCES assessment (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25A32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E9D5C694B FOREIGN KEY (question_group_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE assessment ADD CONSTRAINT FK_F7523D70296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F78BC0FB1 FOREIGN KEY (release_train_id) REFERENCES release_train (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E9D5C694B');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25A32EFC6');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25DD3DD5F1');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F78BC0FB1');
        $this->addSql('ALTER TABLE assessment DROP FOREIGN KEY FK_F7523D70296CD8AE');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE assessment');
        $this->addSql('DROP TABLE release_train');
        $this->addSql('DROP TABLE team');
    }
}
