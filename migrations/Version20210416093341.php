<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416093341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basketball_planning DROP FOREIGN KEY FK_4B7A9EA312469DE2');
        $this->addSql('DROP INDEX IDX_4B7A9EA312469DE2 ON basketball_planning');
        $this->addSql('ALTER TABLE basketball_planning CHANGE category_id basketball_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE basketball_planning ADD CONSTRAINT FK_4B7A9EA3CDADD707 FOREIGN KEY (basketball_category_id) REFERENCES basketball_category (id)');
        $this->addSql('CREATE INDEX IDX_4B7A9EA3CDADD707 ON basketball_planning (basketball_category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basketball_planning DROP FOREIGN KEY FK_4B7A9EA3CDADD707');
        $this->addSql('DROP INDEX IDX_4B7A9EA3CDADD707 ON basketball_planning');
        $this->addSql('ALTER TABLE basketball_planning CHANGE basketball_category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE basketball_planning ADD CONSTRAINT FK_4B7A9EA312469DE2 FOREIGN KEY (category_id) REFERENCES basketball_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4B7A9EA312469DE2 ON basketball_planning (category_id)');
    }
}
