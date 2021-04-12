<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412134501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history ADD date_id INT NOT NULL, DROP date');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BB897366B FOREIGN KEY (date_id) REFERENCES history_date (id)');
        $this->addSql('CREATE INDEX IDX_27BA704BB897366B ON history (date_id)');
        $this->addSql('ALTER TABLE vertical_history ADD date_id INT NOT NULL, DROP date');
        $this->addSql('ALTER TABLE vertical_history ADD CONSTRAINT FK_AED6FE3BB897366B FOREIGN KEY (date_id) REFERENCES history_date (id)');
        $this->addSql('CREATE INDEX IDX_AED6FE3BB897366B ON vertical_history (date_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BB897366B');
        $this->addSql('DROP INDEX IDX_27BA704BB897366B ON history');
        $this->addSql('ALTER TABLE history ADD date VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP date_id');
        $this->addSql('ALTER TABLE vertical_history DROP FOREIGN KEY FK_AED6FE3BB897366B');
        $this->addSql('DROP INDEX IDX_AED6FE3BB897366B ON vertical_history');
        $this->addSql('ALTER TABLE vertical_history ADD date VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP date_id');
    }
}
