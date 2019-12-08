<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191204202715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hotels_hotel_location_details (hotels_id INT NOT NULL, hotel_location_details_id INT NOT NULL, INDEX IDX_A6CC67E9F42F66C8 (hotels_id), INDEX IDX_A6CC67E9DF38E2CC (hotel_location_details_id), PRIMARY KEY(hotels_id, hotel_location_details_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hotels_hotel_location_details ADD CONSTRAINT FK_A6CC67E9F42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotels_hotel_location_details ADD CONSTRAINT FK_A6CC67E9DF38E2CC FOREIGN KEY (hotel_location_details_id) REFERENCES hotel_location_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_photo ADD file_path VARCHAR(255) DEFAULT NULL, DROP image');
        $this->addSql('ALTER TABLE hotel_location_details DROP FOREIGN KEY FK_AFD14B79335AE7E1');
        $this->addSql('DROP INDEX IDX_AFD14B79335AE7E1 ON hotel_location_details');
        $this->addSql('ALTER TABLE hotel_location_details DROP hot_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE hotels_hotel_location_details');
        $this->addSql('ALTER TABLE blog_photo ADD image VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP file_path');
        $this->addSql('ALTER TABLE hotel_location_details ADD hot_id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel_location_details ADD CONSTRAINT FK_AFD14B79335AE7E1 FOREIGN KEY (hot_id) REFERENCES hotels (id)');
        $this->addSql('CREATE INDEX IDX_AFD14B79335AE7E1 ON hotel_location_details (hot_id)');
    }
}
