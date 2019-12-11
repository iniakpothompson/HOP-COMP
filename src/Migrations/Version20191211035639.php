<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211035639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attraction_locations (id INT AUTO_INCREMENT NOT NULL, location VARCHAR(400) NOT NULL, attraction_name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, file_path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attraction_locations_hotels (attraction_locations_id INT NOT NULL, hotels_id INT NOT NULL, INDEX IDX_968906A2CD4EA3DB (attraction_locations_id), INDEX IDX_968906A2F42F66C8 (hotels_id), PRIMARY KEY(attraction_locations_id, hotels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel_amenities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel_amenities_hotels (hotel_amenities_id INT NOT NULL, hotels_id INT NOT NULL, INDEX IDX_68FFC0431222A171 (hotel_amenities_id), INDEX IDX_68FFC043F42F66C8 (hotels_id), PRIMARY KEY(hotel_amenities_id, hotels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_amenities (id INT AUTO_INCREMENT NOT NULL, amenity_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_amenities_rooms (room_amenities_id INT NOT NULL, rooms_id INT NOT NULL, INDEX IDX_20E0B3F3F5F4AF1 (room_amenities_id), INDEX IDX_20E0B3F38E2368AB (rooms_id), PRIMARY KEY(room_amenities_id, rooms_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_prices (id INT AUTO_INCREMENT NOT NULL, room_type_id INT NOT NULL, price NUMERIC(10, 2) NOT NULL, season VARCHAR(255) NOT NULL, INDEX IDX_A585AB98296E3073 (room_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attraction_locations_hotels ADD CONSTRAINT FK_968906A2CD4EA3DB FOREIGN KEY (attraction_locations_id) REFERENCES attraction_locations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attraction_locations_hotels ADD CONSTRAINT FK_968906A2F42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel_amenities_hotels ADD CONSTRAINT FK_68FFC0431222A171 FOREIGN KEY (hotel_amenities_id) REFERENCES hotel_amenities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel_amenities_hotels ADD CONSTRAINT FK_68FFC043F42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_amenities_rooms ADD CONSTRAINT FK_20E0B3F3F5F4AF1 FOREIGN KEY (room_amenities_id) REFERENCES room_amenities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_amenities_rooms ADD CONSTRAINT FK_20E0B3F38E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_prices ADD CONSTRAINT FK_A585AB98296E3073 FOREIGN KEY (room_type_id) REFERENCES room_types (id)');
        $this->addSql('DROP TABLE price');
        $this->addSql('ALTER TABLE blog DROP created_date');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A963243BB18');
        $this->addSql('DROP INDEX IDX_7CA11A963243BB18 ON rooms');
        $this->addSql('ALTER TABLE rooms DROP hotel_id');
        $this->addSql('ALTER TABLE room_types ADD hotel_id INT NOT NULL');
        $this->addSql('ALTER TABLE room_types ADD CONSTRAINT FK_138C289B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('CREATE INDEX IDX_138C289B3243BB18 ON room_types (hotel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attraction_locations_hotels DROP FOREIGN KEY FK_968906A2CD4EA3DB');
        $this->addSql('ALTER TABLE hotel_amenities_hotels DROP FOREIGN KEY FK_68FFC0431222A171');
        $this->addSql('ALTER TABLE room_amenities_rooms DROP FOREIGN KEY FK_20E0B3F3F5F4AF1');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, room_id INT NOT NULL, price VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, Hotels_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CAC822D976DEE46B (Hotels_id), INDEX IDX_CAC822D954177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D976DEE46B FOREIGN KEY (Hotels_id) REFERENCES hotels (id)');
        $this->addSql('DROP TABLE attraction_locations');
        $this->addSql('DROP TABLE attraction_locations_hotels');
        $this->addSql('DROP TABLE hotel_amenities');
        $this->addSql('DROP TABLE hotel_amenities_hotels');
        $this->addSql('DROP TABLE room_amenities');
        $this->addSql('DROP TABLE room_amenities_rooms');
        $this->addSql('DROP TABLE room_prices');
        $this->addSql('ALTER TABLE blog ADD created_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE room_types DROP FOREIGN KEY FK_138C289B3243BB18');
        $this->addSql('DROP INDEX IDX_138C289B3243BB18 ON room_types');
        $this->addSql('ALTER TABLE room_types DROP hotel_id');
        $this->addSql('ALTER TABLE rooms ADD hotel_id INT NOT NULL');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A963243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('CREATE INDEX IDX_7CA11A963243BB18 ON rooms (hotel_id)');
    }
}
