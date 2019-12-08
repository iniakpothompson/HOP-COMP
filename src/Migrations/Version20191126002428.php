<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126002428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143530B1B54');
        $this->addSql('DROP INDEX IDX_C0155143530B1B54 ON blog');
        $this->addSql('ALTER TABLE blog CHANGE blog_author_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C0155143F675F31B ON blog (author_id)');
        $this->addSql('ALTER TABLE blog_comment DROP FOREIGN KEY FK_7882EFEFA76ED395');
        $this->addSql('DROP INDEX IDX_7882EFEFA76ED395 ON blog_comment');
        $this->addSql('ALTER TABLE blog_comment CHANGE user_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEFF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7882EFEFF675F31B ON blog_comment (author_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143F675F31B');
        $this->addSql('DROP INDEX IDX_C0155143F675F31B ON blog');
        $this->addSql('ALTER TABLE blog CHANGE author_id blog_author_id INT NOT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143530B1B54 FOREIGN KEY (blog_author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C0155143530B1B54 ON blog (blog_author_id)');
        $this->addSql('ALTER TABLE blog_comment DROP FOREIGN KEY FK_7882EFEFF675F31B');
        $this->addSql('DROP INDEX IDX_7882EFEFF675F31B ON blog_comment');
        $this->addSql('ALTER TABLE blog_comment CHANGE author_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7882EFEFA76ED395 ON blog_comment (user_id)');
    }
}
