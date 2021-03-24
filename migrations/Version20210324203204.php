<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324203204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE section_salary_salaries (section_salary_id INT NOT NULL, salaries_id INT NOT NULL, INDEX IDX_E129C840D2B081EB (section_salary_id), INDEX IDX_E129C84071204C38 (salaries_id), PRIMARY KEY(section_salary_id, salaries_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE section_salary_salaries ADD CONSTRAINT FK_E129C840D2B081EB FOREIGN KEY (section_salary_id) REFERENCES section_salary (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_salary_salaries ADD CONSTRAINT FK_E129C84071204C38 FOREIGN KEY (salaries_id) REFERENCES salaries (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84B5080DCD7');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84B69B2D229');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84BA854C3EF');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY FK_E6EEB84BD24B7B55');
        $this->addSql('DROP INDEX IDX_E6EEB84B5080DCD7 ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84B69B2D229 ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84BA854C3EF ON salaries');
        $this->addSql('DROP INDEX IDX_E6EEB84BD24B7B55 ON salaries');
        $this->addSql('ALTER TABLE salaries DROP firstsection_id, DROP secondsection_id, DROP thridsection_id, DROP fourthsection_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE section_salary_salaries');
        $this->addSql('ALTER TABLE salaries ADD firstsection_id INT NOT NULL, ADD secondsection_id INT DEFAULT NULL, ADD thridsection_id INT DEFAULT NULL, ADD fourthsection_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84B5080DCD7 FOREIGN KEY (thridsection_id) REFERENCES section_salary (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84B69B2D229 FOREIGN KEY (firstsection_id) REFERENCES section_salary (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84BA854C3EF FOREIGN KEY (secondsection_id) REFERENCES section_salary (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84BD24B7B55 FOREIGN KEY (fourthsection_id) REFERENCES section_salary (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E6EEB84B5080DCD7 ON salaries (thridsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84B69B2D229 ON salaries (firstsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84BA854C3EF ON salaries (secondsection_id)');
        $this->addSql('CREATE INDEX IDX_E6EEB84BD24B7B55 ON salaries (fourthsection_id)');
    }
}
