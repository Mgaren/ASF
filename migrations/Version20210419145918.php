<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419145918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section ADD section_salary_id INT NOT NULL, DROP titre');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFD2B081EB FOREIGN KEY (section_salary_id) REFERENCES section_salary (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEFD2B081EB ON section (section_salary_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFD2B081EB');
        $this->addSql('DROP INDEX IDX_2D737AEFD2B081EB ON section');
        $this->addSql('ALTER TABLE section ADD titre VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP section_salary_id');
    }
}
