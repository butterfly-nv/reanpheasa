
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="Utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>REAN PHEASA</title>
  <style>
    .navy {
      background-color: #000c54;
    }

   
    .logo-text {
      font-size: 20px;
      font-weight: 300;
      margin-left: 10px;
    }

    .book {
      margin: 50px;
    }

    .vocab,
    .grammar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      text-align: center;
    }

    .v-book,
    .g-book-1,
    .g-book-2,
    .g-book-3,
    .g-book-4 {
      flex: 1 1 calc(25% - 20px);
      max-width: calc(25% - 20px);
    }

    .img-sec img,
    .imgg-sec img {
      width: 200px;
      height: 300px;
    }

    .text-sec,
    .textg-sec {
      margin-top: 15px;
      font-size: 20px;
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }

    .text-sec a,
    .textg-sec a {
      color: black;
      text-decoration: none;
      font-size: 25px;
    }

    .text-sec a:hover,
    .textg-sec a:hover {
      color: #ffdf00; /* Changed hover color to yellow for contrast */
      text-decoration: underline;
    }

    .footer {
      background-color: #000c54;
      color: #ffff;
      padding: 20px 0;
      text-align: center;
    }

    .footer a {
      color: #ffff;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer .social-icons img {
      width: 30px;
      margin-right: 10px;
    }

    .footer .english-tests {
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .v-book,
      .g-book-1,
      .g-book-2,
      .g-book-3,
      .g-book-4 {
        flex: 1 1 100%;
        max-width: 100%;
      }

      .navbar-custom .navbar-brand img {
        height: 50px;
      }

      .logo-text {
        font-size: 16px;
      }

      .navbar-custom .nav-link {
        margin-right: 0;
        margin-bottom: 10px;
      }
    }
  </style>
</head>

<body>
 

  <div class="book">
    <h2>Extra Courses</h2><br>
    <h3>Vocabulary</h3>
    <br>
    <div class="vocab">
      <div class="v-book">
        <div class="img-sec">
          <img src="image/vbook1.png" alt="vocab-book-1">
        </div>
        <div class="text-sec">
          <a href="https://www.amazon.com/English-Grammar-Use-Book-Answers/dp/1108457657">English Vocabulary In Use</a>
        </div>
      </div>
      <div class="v-book">
        <div class="img-sec">
          <img src="image/vbook2.JPG" alt="vocab-book-2">
        </div>
        <div class="text-sec">
          <a href="https://www.amazon.in/English-Vocabulary-Made-Easy-Improving/dp/9350570793">English Vocabulary Made Easy</a>
        </div>
      </div>
      <div class="v-book">
        <div class="img-sec">
          <img src="image/vbook3.JPG" alt="vocab-book-3">
        </div>
        <div class="text-sec">
          <a href="https://www.nbf.org.pk/books/item/essential-english-vocabulary">Essential English Vocabulary</a>
        </div>
      </div>
      <div class="v-book">
        <div class="img-sec">
          <img src="image/vbook4.JPG" alt="vocab-book-4">
        </div>
        <div class="text-sec">
          <a href="https://www.reddit.com/r/nostalgia/comments/73sety/these_high_school_vocabulary_books_sadlieroxford/">Vocabulary Workshop</a>
        </div>
      </div>
    </div><br>
    <h3>Grammar</h3><br><br>
    <div class="grammar">
      <div class="g-book-1">
        <div class="imgg-sec">
          <img src="image/gbook1.JPG" alt="grammar-1">
        </div>
        <div class="textg-sec">
          <a href="https://www.kobo.com/gr/en/ebook/oxford-modern-english-grammar">Modern English Grammar</a>
        </div>
      </div>
      <div class="g-book-2">
        <div class="imgg-sec">
          <img src="image/gbook2.JPG" alt="grammar-2">
        </div>
        <div class="textg-sec">
          <a href="https://www.kobo.com/gr/en/ebook/the-oxford-dictionary-of-english-grammar">Dictionary of English Grammar</a>
        </div>
      </div>
      <div class="g-book-3">
        <div class="imgg-sec">
          <img src="image/gbook3.JPG" alt="grammar-3">
        </div>
        <div class="textg-sec">
          <a href="https://www.amazon.com/Basic-Grammar-Students-Book-Answers/dp/1316646742">Basic Grammar In Use</a>
        </div>
      </div>
      <div class="g-book-4">
        <div class="imgg-sec">
          <img src="image/gbook4.JPG" alt="grammar-4">
        </div>
        <div class="textg-sec">
          <a href="https://www.amazon.com/English-Grammar-Use-Book-Answers/dp/1108457657">English Grammar In Use</a>
        </div>
      </div>
    </div>
  </div>

  <?php include 'bfooter.php'; ?> 
