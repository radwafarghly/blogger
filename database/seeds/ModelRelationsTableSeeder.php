<?php

use Illuminate\Database\Seeder;

class ModelRelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelrelations = [
            [
                'model' => 'App\Post',
                'relation' => 'user',
                'relationdisplayname' => 'user post'

            ],
            [
                'model' => 'App\Article',
                'relation' => 'user',
                'relationdisplayname' => 'user article'
            ],
            [
                'model' => 'App\Comment',
                'relation' => 'user',
                'relationdisplayname' => 'user comment'
            ],

            [
                'model' => 'App\User',
                'relation' => 'articles',
                'relationdisplayname' => 'user has many articles '
            ],

            [
                'model' => 'App\User',
                'relation' => 'posts',
                'relationdisplayname' => ' user has many posts  '
            ],

            [
                'model' => 'App\User',
                'relation' => 'comments',
                'relationdisplayname' => 'user has many comments '
            ],
        ];

        foreach ($modelrelations as $key => $value) {
            \App\ModelRelation::create($value);
        }
    }
}
