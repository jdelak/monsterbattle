<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241212175542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, is_playable TINYINT(1) NOT NULL, profile_sprite VARCHAR(255) NOT NULL, discuss_sprite VARCHAR(255) NOT NULL, idle_sprite VARCHAR(255) NOT NULL, moving_sprite VARCHAR(255) NOT NULL, back_sprite VARCHAR(255) DEFAULT NULL, front_sprite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE badge (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, base_bonus INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effect (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type1 VARCHAR(255) NOT NULL, type2 VARCHAR(255) DEFAULT NULL, base_hp INT NOT NULL, base_attack INT NOT NULL, base_defense INT NOT NULL, base_special_attack INT NOT NULL, base_special_defense INT NOT NULL, base_speed INT NOT NULL, sprite_front VARCHAR(255) NOT NULL, sprite_back VARCHAR(255) NOT NULL, can_evolve TINYINT(1) NOT NULL, evolve_to INT DEFAULT NULL, evolution_level INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE move (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, attacktype VARCHAR(255) NOT NULL, power INT NOT NULL, accuracy INT NOT NULL, base_pp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE move_effect (id INT AUTO_INCREMENT NOT NULL, id_move_id INT NOT NULL, id_effect_id INT NOT NULL, target TINYINT(1) NOT NULL, amount INT DEFAULT NULL, duration INT DEFAULT NULL, INDEX IDX_19A688A1B358E8D8 (id_move_id), INDEX IDX_19A688A175DC041C (id_effect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE move_effect ADD CONSTRAINT FK_19A688A1B358E8D8 FOREIGN KEY (id_move_id) REFERENCES move (id)');
        $this->addSql('ALTER TABLE move_effect ADD CONSTRAINT FK_19A688A175DC041C FOREIGN KEY (id_effect_id) REFERENCES effect (id)');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE move_effect DROP FOREIGN KEY FK_19A688A1B358E8D8');
        $this->addSql('ALTER TABLE move_effect DROP FOREIGN KEY FK_19A688A175DC041C');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE move');
        $this->addSql('DROP TABLE move_effect');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) DEFAULT NULL');
    }
}
