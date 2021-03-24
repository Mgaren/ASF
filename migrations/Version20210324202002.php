<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324202002 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE salaries_section_salary');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE salaries_section_salary (salaries_id INT NOT NULL, section_salary_id INT NOT NULL, INDEX IDX_FE0629CA71204C38 (salaries_id), INDEX IDX_FE0629CAD2B081EB (section_salary_id), PRIMARY KEY(salaries_id, section_salary_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE salaries_section_salary ADD CONSTRAINT FK_FE0629CA71204C38 FOREIGN KEY (salaries_id) REFERENCES salaries (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salaries_section_salary ADD CONSTRAINT FK_FE0629CAD2B081EB FOREIGN KEY (section_salary_id) REFERENCES section_salary (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
