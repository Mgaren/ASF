<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415125938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE history_date (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actuality ADD description3 VARCHAR(255) DEFAULT NULL, ADD description4 VARCHAR(255) DEFAULT NULL, ADD description5 VARCHAR(255) DEFAULT NULL, ADD description6 VARCHAR(255) DEFAULT NULL, ADD description7 VARCHAR(255) DEFAULT NULL, ADD description8 VARCHAR(255) DEFAULT NULL, ADD description9 VARCHAR(255) DEFAULT NULL, ADD description10 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE carousel_history ADD image6 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE carousel_partenaire ADD image27 VARCHAR(255) DEFAULT NULL, ADD image28 VARCHAR(255) DEFAULT NULL, ADD image29 VARCHAR(255) DEFAULT NULL, ADD image30 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE dirigeants_post ADD number VARCHAR(255) NOT NULL');
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
        $this->addSql('ALTER TABLE vertical_history DROP FOREIGN KEY FK_AED6FE3BB897366B');
        $this->addSql('DROP TABLE history_date');
        $this->addSql('ALTER TABLE actuality DROP description3, DROP description4, DROP description5, DROP description6, DROP description7, DROP description8, DROP description9, DROP description10');
        $this->addSql('ALTER TABLE carousel_history DROP image6');
        $this->addSql('ALTER TABLE carousel_partenaire DROP image27, DROP image28, DROP image29, DROP image30');
        $this->addSql('ALTER TABLE dirigeants_post DROP number');
        $this->addSql('DROP INDEX IDX_27BA704BB897366B ON history');
        $this->addSql('ALTER TABLE history ADD date VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP date_id');
        $this->addSql('DROP INDEX IDX_AED6FE3BB897366B ON vertical_history');
        $this->addSql('ALTER TABLE vertical_history ADD date VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP date_id');
    }
}
