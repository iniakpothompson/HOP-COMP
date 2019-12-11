<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211112906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE employees_employee_allowance');
        $this->addSql('DROP TABLE employees_employee_bonus');
        $this->addSql('DROP TABLE employees_employee_deduction');
        $this->addSql('ALTER TABLE employee_contact ADD office_phone_number VARCHAR(45) NOT NULL, DROP phone_number, DROP email, DROP cellular_number');
        $this->addSql('ALTER TABLE employees DROP last_name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE employees_employee_allowance (employees_id INT NOT NULL, employee_allowance_id INT NOT NULL, INDEX IDX_A1865988520A30B (employees_id), INDEX IDX_A186598618C440 (employee_allowance_id), PRIMARY KEY(employees_id, employee_allowance_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE employees_employee_bonus (employees_id INT NOT NULL, employee_bonus_id INT NOT NULL, INDEX IDX_4BA8339D8520A30B (employees_id), INDEX IDX_4BA8339DF96B07A1 (employee_bonus_id), PRIMARY KEY(employees_id, employee_bonus_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE employees_employee_deduction (employees_id INT NOT NULL, employee_deduction_id INT NOT NULL, INDEX IDX_2ED42888520A30B (employees_id), INDEX IDX_2ED4288D2CD3CE (employee_deduction_id), PRIMARY KEY(employees_id, employee_deduction_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE employees_employee_allowance ADD CONSTRAINT FK_A186598618C440 FOREIGN KEY (employee_allowance_id) REFERENCES employee_allowance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_employee_allowance ADD CONSTRAINT FK_A1865988520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_employee_bonus ADD CONSTRAINT FK_4BA8339D8520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_employee_bonus ADD CONSTRAINT FK_4BA8339DF96B07A1 FOREIGN KEY (employee_bonus_id) REFERENCES employee_bonus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_employee_deduction ADD CONSTRAINT FK_2ED42888520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_employee_deduction ADD CONSTRAINT FK_2ED4288D2CD3CE FOREIGN KEY (employee_deduction_id) REFERENCES employee_deduction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee_contact ADD email VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, ADD cellular_number VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE office_phone_number phone_number VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE employees ADD last_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
