<?php
class Article
{
    public $type;
    public $title;
    public $text;
    public $breakingNews;

    public function __construct($type, $title, $text, $breakingNews = false)
    {
        $this->type = $type;
        $this->title = $title;
        $this->text = $text;
        $this->breakingNews = $breakingNews;
    }

    public function getTitle(): string
    {
        $modifiedTitle = $this->title;

        if ($this->breakingNews) {
            $modifiedTitle = "BREAKING: " . $modifiedTitle;
        }

        if ($this->type == "ad") {
            $modifiedTitle = strtoupper($modifiedTitle);
        } elseif ($this->type == "vacancy") {
            $modifiedTitle .= " - apply now!";
        }

        return $modifiedTitle;
    }

    public function getContent(): string
    {
        return '<article><h2>' . $this->getTitle() . '</h2><p>' . $this->text . '</p></article>';
    }
}

$articles = [
    new Article('news','Important Article', 'This is an important article.'),
    new Article('vacancy','New-York with Airbnb Buy One, Get One Free ', 'Limited time offer'),
    new Article('ad','Buy One Get One Free!', 'Limited time offer - buy one, get one free!', true),
];

foreach ($articles as $article) {
    echo $article->getContent() . "<br>";
}

?>
