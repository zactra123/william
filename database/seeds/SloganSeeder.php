<?php

use Illuminate\Database\Seeder;

class SloganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slogans')->truncate();

        DB::table('slogans')->insert([

            [
                'author' =>'Nelson Mandela',
                'slogan' =>'The greatest glory in living lies not in never falling, but in rising every time we fall.',
            ],
            [
                'author' =>'Walt Disney',
                'slogan' =>'The way to get started is to quit talking and begin doing.',
            ],
            [
                'author' =>'Steve Jobs',
                'slogan' =>"Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking.",
            ],
            [
                'author' =>'Eleanor Roosevelt',
                'slogan' =>'If life were predictable it would cease to be life, and be without flavor.',
            ],

            [
                'author' =>'Oprah Winfrey',
                'slogan' =>"If you look at what you have in life, you'll always have more. If you look at what you don't  have in life, you'll never have enough.",
            ],

            [
                'author' =>"James Cameron",
                'slogan'=>"If you set your goals ridiculously high and it's a failure, you will fail above everyone  else's success.",
            ],
            [
                'author' =>"John Lennon",
                'slogan'=>"Life is what happens when you're busy making other plans.",
            ],
            [
                'author' =>"Mother Teresa",
                'slogan'=>"Spread love everywhere you go. Let no one ever come to you without leaving happier.",
            ],
            [
                'author' =>"Franklin D. Roosevelt",
                'slogan'=>"When you reach the end of your rope, tie a knot in it and hang on.",
            ],
            [
                'author' =>"Margaret Mead",
                'slogan'=>"Always remember that you are absolutely unique. Just like everyone else.",
            ],
            [
                'author' =>"Robert Louis Stevenson",
                'slogan'=>"Don't judge each day by the harvest you reap but by the seeds that you plant.",
            ],
            [
                'author' =>"Eleanor Roosevelt",
                'slogan'=>"The future belongs to those who believe in the beauty of their dreams.",
            ],
            [
                'author' =>"Benjamin Franklin",
                'slogan'=>"Tell me and I forget. Teach me and I remember. Involve me and I learn.",
            ],
            [
                'author' =>"Helen Keller",
                'slogan'=>"The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart",
            ],
            [
                'author' =>"Aristotle",
                'slogan'=>"It is during our darkest moments that we must focus to see the light.",
            ],
            [
                'author' =>"Anne Frank",
                'slogan'=>"Whoever is happy will make others happy too.",
            ],
            [
                'author' =>"Ralph Waldo Emerson",
                'slogan'=>"Do not go where the path may lead, go instead where there is no path and leave a trail.",
            ],
            [
                'author' =>"Maya Angelou",
                'slogan'=>"You will face many defeats in life, but never let yourself be defeated.",
            ],
            [
                'author' =>"Nelson Mandela",
                'slogan'=>"The greatest glory in living lies not in never falling, but in rising every time we fall.",
            ],
            [
                'author' =>"Abraham Lincoln",
                'slogan'=>"In the end, it's not the years in your life that count. It's the life in your years.",
            ],
            [
                'author' =>"Babe Ruth",
                'slogan'=>"Never let the fear of striking out keep you from playing the game.",
            ],
            [
                'author' =>"Helen Keller",
                'slogan'=>"Life is either a daring adventure or nothing at all.",
            ],
            [
                'author' =>"Thomas A. Edison",
                'slogan'=>"Many of life's failures are people who did not realize how close they were to success when they gave up.",
            ],
            [
                'author' =>"Dr. Seuss",
                'slogan'=>"You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose.",
            ],
            [
                'author' =>"Eleanor Roosevelt",
                'slogan'=>"If life were predictable it would cease to be life and be without flavor.",
            ],
            [
                'author' =>"Abraham Lincoln",
                'slogan'=>"In the end, it's not the years in your life that count. It's the life in your years.",
            ],
            [
                'author' =>"Ralph Waldo Emerson",
                'slogan'=>"Life is a succession of lessons which must be lived to be understood.",
            ],
            [
                'author' =>"Maya Angelou",
                'slogan'=>"You will face many defeats in life, but never let yourself be defeated.",
            ],
        ]);
    }
}
