<?php
/*
Plugin Name: Quote Generator by Mirko Trotta
Plugin URI: http://localhost:8000
Description: A custom quote generator plugin that integrates directly into WordPress, showing dynamic quotes without the use of React.
Version: 1.0
Author: Mirko Trotta
Author URI: http://localhost:8000
*/

defined('ABSPATH') or die('Direct script access disallowed.');

function qg_enqueue_scripts() {
    wp_enqueue_script('qg-js', plugins_url('/quote-generator.js', __FILE__), array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'qg_enqueue_scripts');

function qg_shortcode() {
    $quotes = [
        "Life is what happens when you're busy making other plans. - John Lennon",
        "The purpose of our lives is to be happy. - Dalai Lama",
        "Get busy living or get busy dying. - Stephen King",
        "A journey of a thousand miles begins with a single step. - Laozi",
        "Monday-Friday, if I’m awake, I’m either working out or working on my goals. - Tom Bilyeu",
        "At dawn, when you have trouble getting out of bed, tell yourself: ‘I have to go to work – as a human being... I’m going to do what I was born for...Or is this what I was created for? To huddle under the blankets and stay warm? - Marcus Aurelius",
        "You gotta know your stuff inside and out. You have to live it and breathe it. You gotta be ready. - Unknown",
        "Change is hard at first, messy in the middle and gorgeous at the end. - Robin Sharma",
        "Success isn’t always about greatness. It’s about consistency. Consistent, hard work gains success. Greatness will come. - The Rock",
        "Dream big. Start small. Begin now. - Unknown",
        "Don’t take anything personally. - Don Miguel Ruiz",
        "Keep your eye on the ball. - William Kingston",
        "If the answer isn't simple, it's probably not the answer. - Unkwon Inspire in the Occam’s Razor",
        "Nothing will fill your heart with a greater sense of regret than lying on your deathbed knowing that you, did not live your life and do your dreams. - Unknown",
        "Become the best in the world at what you do. Keep redefining what you do until this is true. - Naval Ravikan",
        "Show me someone who isn’t a slave! One is a slave to lust, another to greed, another to power, and all are slaves to fear. I could name a former Consul who is a slave to a little old woman, a millionaire who is the slave of the cleaning woman … No servitude is more abject than the self-imposed. - Seneca",
        "Hard work has made it easy. That is my secret. That is why I win. - Nadia Comaneci",
        "If you tell the truth, you don't have to remember anything. - Mark Twain",
        "Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi",
        "Do you want to know who you are? Don't ask. Act! Action will delineate and define you. - Thomas Jefferson",
        "The way to get started is to quit talking and begin doing. - Walt Disney",
        "My confidence came from my vision. . . . I am a big believer that if you have a very clear vision of where you want to go, then the rest of it is much easier. Because you always know why you are training 5 hours a day, you always know why you are pushing and going through the pain barrier, and why you have to eat more, and why you have to struggle more, and why you have to be more disciplined… I felt that I could win it, and that was what I was there for. I wasn’t there to compete. I was there to win. - Arnold Schwarzenegger",
        "The answer is always DO MORE. Try more. Learn more. Push harder. Work longer. Be willing to bleed for it. That’s the way forward. - Tom Billeu",
        "Whatever you can do, or dream you can, begin it. Boldness has genius, magic, and power in it. Begin it now. - W. H. Murray",
        "Do your job. - Bill Bill Belichick",
        "Like a Roman, like a good soldier, like a master of our craft. We don't need to get lost in a thousand other distratcions or in other people's business. - Ryan Holiday (The Daily Stoic)"
    ];
    $random_index = array_rand($quotes);  // Get a random quote index
    $random_quote = $quotes[$random_index];  // Select the quote

    // Adding a button to fetch a new quote without reloading the page
    $output = "<div id='quote-generator-root'>{$random_quote}</div>";
    $output .= "<button id='new-quote-button' style='margin-top: 20px;'>Get New Quote</button>";
    return $output;
}
add_shortcode('quote_generator', 'qg_shortcode');
