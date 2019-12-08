<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126010202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employee_contact CHANGE home_phone_number home_phone_number VARCHAR(45) DEFAULT NULL, CHANGE cellular_number cellular_number VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE employees CHANGE birth_date birth_date DATETIME DEFAULT NULL, CHANGE marital_status marital_status VARCHAR(45) DEFAULT NULL, CHANGE number_of_children number_of_children VARCHAR(45) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employee_contact CHANGE home_phone_number home_phone_number VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE cellular_number cellular_number VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE employees CHANGE birth_date birth_date DATETIME NOT NULL, CHANGE marital_status marital_status VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE number_of_children number_of_children VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
