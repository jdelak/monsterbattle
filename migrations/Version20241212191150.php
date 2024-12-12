<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241212191150 extends AbstractMigration
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
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type1 VARCHAR(255) NOT NULL, type2 VARCHAR(255) DEFAULT NULL, base_hp INT NOT NULL, base_attack INT NOT NULL, base_defense INT NOT NULL, base_special_attack INT NOT NULL, base_special_defense INT NOT NULL, base_speed INT NOT NULL, sprite_front VARCHAR(255) NOT NULL, sprite_back VARCHAR(255) NOT NULL, can_evolve TINYINT(1) NOT NULL, evolve_to INT DEFAULT NULL, evolution_level INT DEFAULT NULL, base_hp_level DOUBLE PRECISION NOT NULL, base_attack_level DOUBLE PRECISION NOT NULL, base_defense_level DOUBLE PRECISION NOT NULL, base_special_attack_level DOUBLE PRECISION NOT NULL, base_special_defense_level DOUBLE PRECISION NOT NULL, base_speed_level DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_move (id INT AUTO_INCREMENT NOT NULL, monster_id_id INT NOT NULL, move_id_id INT NOT NULL, required_level INT NOT NULL, INDEX IDX_CB43E2389BCA212 (monster_id_id), INDEX IDX_CB43E238B34681FE (move_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE move (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, attacktype VARCHAR(255) NOT NULL, power INT NOT NULL, accuracy INT NOT NULL, base_pp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE move_effect (id INT AUTO_INCREMENT NOT NULL, id_move_id INT NOT NULL, id_effect_id INT NOT NULL, target TINYINT(1) NOT NULL, amount INT DEFAULT NULL, duration INT DEFAULT NULL, INDEX IDX_19A688A1B358E8D8 (id_move_id), INDEX IDX_19A688A175DC041C (id_effect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_monster (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, monster_id_id INT NOT NULL, related_to INT NOT NULL, level INT NOT NULL, max_hp INT NOT NULL, max_attack INT NOT NULL, max_defense INT NOT NULL, max_special_attack INT NOT NULL, max_special_defense INT NOT NULL, max_speed INT NOT NULL, current_hp INT NOT NULL, bonus_hp_level DOUBLE PRECISION NOT NULL, bonus_attack_level INT NOT NULL, bonus_defense_level DOUBLE PRECISION NOT NULL, bonus_special_attack_level DOUBLE PRECISION NOT NULL, bonus_special_defense_level DOUBLE PRECISION NOT NULL, bonus_speed_level DOUBLE PRECISION NOT NULL, experience INT NOT NULL, in_party TINYINT(1) NOT NULL, position INT NOT NULL, INDEX IDX_7C53D8FE9D86650F (user_id_id), INDEX IDX_7C53D8FE9BCA212 (monster_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monster_move ADD CONSTRAINT FK_CB43E2389BCA212 FOREIGN KEY (monster_id_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE monster_move ADD CONSTRAINT FK_CB43E238B34681FE FOREIGN KEY (move_id_id) REFERENCES move (id)');
        $this->addSql('ALTER TABLE move_effect ADD CONSTRAINT FK_19A688A1B358E8D8 FOREIGN KEY (id_move_id) REFERENCES move (id)');
        $this->addSql('ALTER TABLE move_effect ADD CONSTRAINT FK_19A688A175DC041C FOREIGN KEY (id_effect_id) REFERENCES effect (id)');
        $this->addSql('ALTER TABLE user_monster ADD CONSTRAINT FK_7C53D8FE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_monster ADD CONSTRAINT FK_7C53D8FE9BCA212 FOREIGN KEY (monster_id_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster_move DROP FOREIGN KEY FK_CB43E2389BCA212');
        $this->addSql('ALTER TABLE monster_move DROP FOREIGN KEY FK_CB43E238B34681FE');
        $this->addSql('ALTER TABLE move_effect DROP FOREIGN KEY FK_19A688A1B358E8D8');
        $this->addSql('ALTER TABLE move_effect DROP FOREIGN KEY FK_19A688A175DC041C');
        $this->addSql('ALTER TABLE user_monster DROP FOREIGN KEY FK_7C53D8FE9D86650F');
        $this->addSql('ALTER TABLE user_monster DROP FOREIGN KEY FK_7C53D8FE9BCA212');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monster_move');
        $this->addSql('DROP TABLE move');
        $this->addSql('DROP TABLE move_effect');
        $this->addSql('DROP TABLE user_monster');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) DEFAULT NULL');
    }
}
