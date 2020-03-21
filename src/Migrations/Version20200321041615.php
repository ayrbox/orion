<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321041615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reserve_blood_status (id INT AUTO_INCREMENT NOT NULL, blood_type_id INT DEFAULT NULL, reserve_id INT DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, INDEX IDX_D7F1DC737AEA5732 (blood_type_id), INDEX IDX_D7F1DC735913AEBF (reserve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blood_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, symbol VARCHAR(10) NOT NULL, status VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reserve_blood_status ADD CONSTRAINT FK_D7F1DC737AEA5732 FOREIGN KEY (blood_type_id) REFERENCES blood_types (id)');
        $this->addSql('ALTER TABLE reserve_blood_status ADD CONSTRAINT FK_D7F1DC735913AEBF FOREIGN KEY (reserve_id) REFERENCES reserves (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reserve_blood_status DROP FOREIGN KEY FK_D7F1DC737AEA5732');
        $this->addSql('DROP TABLE reserve_blood_status');
        $this->addSql('DROP TABLE donors');
        $this->addSql('DROP TABLE blood_types');
    }
}
