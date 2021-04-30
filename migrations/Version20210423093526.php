<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423093526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_category ADD section_id INT NOT NULL');
        $this->addSql('ALTER TABLE section_category ADD CONSTRAINT FK_9621439DD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_9621439DD823E37A ON section_category (section_id)');
        $this->addSql('ALTER TABLE section_planning ADD section_id INT NOT NULL');
        $this->addSql('ALTER TABLE section_planning ADD CONSTRAINT FK_44F4E5AAD823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_44F4E5AAD823E37A ON section_planning (section_id)');
        $this->addSql('ALTER TABLE section_sport ADD section_id INT NOT NULL');
        $this->addSql('ALTER TABLE section_sport ADD CONSTRAINT FK_8DD288B6D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_8DD288B6D823E37A ON section_sport (section_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_category DROP FOREIGN KEY FK_9621439DD823E37A');
        $this->addSql('DROP INDEX IDX_9621439DD823E37A ON section_category');
        $this->addSql('ALTER TABLE section_category DROP section_id');
        $this->addSql('ALTER TABLE section_planning DROP FOREIGN KEY FK_44F4E5AAD823E37A');
        $this->addSql('DROP INDEX IDX_44F4E5AAD823E37A ON section_planning');
        $this->addSql('ALTER TABLE section_planning DROP section_id');
        $this->addSql('ALTER TABLE section_sport DROP FOREIGN KEY FK_8DD288B6D823E37A');
        $this->addSql('DROP INDEX IDX_8DD288B6D823E37A ON section_sport');
        $this->addSql('ALTER TABLE section_sport DROP section_id');
    }
}
