<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    private const
        ARTICLES_QUANTITY = 50,
        TAGS_QUANTITY = 15;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        self::truncate();

        Article::factory()
            ->count(self::ARTICLES_QUANTITY)
            ->create();

        Tag::factory()
            ->count(self::TAGS_QUANTITY)
            ->create();

        for ($articleId = 1; $articleId <= self::ARTICLES_QUANTITY; $articleId++) {
            $requiredTagsQty = rand(1, 3);
            $this->addTagsToArticle($articleId, $requiredTagsQty);
        }
    }

    private function addTagsToArticle(int $articleId, int $requiredTagsQty): void
    {
        $usedTagsIds = [];
        for ($i = 0; $i < $requiredTagsQty; $i++) {
            do {
                $tagId = rand(1, self::TAGS_QUANTITY);
            } while (in_array($tagId, $usedTagsIds, true));

            DB::table('article_tag')->insert([
                'article_id' => $articleId,
                'tag_id' => $tagId,
            ]);

            $usedTagsIds[] = $tagId;
        }
    }

    private static function truncate(): void
    {
        DB::table('articles')->truncate();
        DB::table('tags')->truncate();
        DB::table('article_tag')->truncate();
    }
}
