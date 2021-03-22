<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322172157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dirigeants ADD dirigeants_post_id INT NOT NULL, DROP post');
        $this->addSql('ALTER TABLE dirigeants ADD CONSTRAINT FK_3CB249BFD257F109 FOREIGN KEY (dirigeants_post_id) REFERENCES dirigeants_post (id)');
        $this->addSql('CREATE INDEX IDX_3CB249BFD257F109 ON dirigeants (dirigeants_post_id)');
        $this->addSql('ALTER TABLE salaries ADD firstsection_id INT NOT NULL, ADD secondsection_id INT DEFAULT NULL, ADD thridsection_id INT DEFAULT NULL, ADD fourthsection_id INT DEFAULT NULL, DROP firstsection, DROP secondsection, DROP thridsection, DROP fourthsection');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84B69B2D229 FOREIGN KEY (firstsection_id) REFERENCES section_salary (id)');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84BA854C3EF FOREIGN KEY (secondsection_id) REFERENCES section_salary (id)');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84B5080DCD7 FOREIGN KEY (thridsection_id) REFERENCES section_salary (id)');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84BD24B7B55 FOREIGN KEY (fourthsection_id) REFERENCES section_salary (id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84B69B2D229 ON salaries (firstsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84BA854C3EF ON salaries (secondsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84B5080DCD7 ON salaries (thridsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84BD24B7B55 ON salaries (fourthsection_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE dirigeants DROP FOREIGN KEY FK_3CB249BFD257F109');
        $this->addSql('DROP INDEX IDX_3CB249BFD257F109 ON dirigeants');
        $this->addSql('ALTER TABLE dirigeants ADD post VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP dirigeants_post_id');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84B69B2D229');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84BA854C3EF');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84B5080DCD7');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84BD24B7B55');
        $this->addSql('DROP INDEX IDX_E6EEB84B69B2D229 ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84BA854C3EF ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84B5080DCD7 ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84BD24B7B55 ON salaries');
        $this->addSql('ALTER TABLE salaries ADD firstsection VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD secondsection VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD thridsection VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD fourthsection VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP firstsection_id, DROP secondsection_id, DROP thridsection_id, DROP fourthsection_id');
    }
}
