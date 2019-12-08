<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126161626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_comment DROP FOREIGN KEY FK_7882EFEF9A4AA658');
        $this->addSql('DROP INDEX IDX_7882EFEF9A4AA658 ON blog_comment');
        $this->addSql('ALTER TABLE blog_comment DROP guest_id, DROP email');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_comment ADD guest_id INT NOT NULL, ADD email VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEF9A4AA658 FOREIGN KEY (guest_id) REFERENCES guest_or_customer (id)');
        $this->addSql('CREATE INDEX IDX_7882EFEF9A4AA658 ON blog_comment (guest_id)');
    }
}
