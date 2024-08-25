<?php include 'header.php'; ?>
 <link rel="stylesheet" href="css/level.css">
 
<div class="container selection">
    <a href="home.html">
      <h2>Course</h2>
    </a>
    <a href="#">
      <h2>Next Level</h2>
    </a>
</div>
<div class="unit" id="unit1Link">
    <h1>Unit 1 Animal</h1>
</div>
<div class="container vocab-section" id="vocabularySection">
    <div class="section-lesson">
      <div class="type">
        <h2>Vocabulary</h2>
      </div>
      <div class="intro">
        <h3>Animal</h3>
        <p>1. Listen and repeat. (Touch the image to play the pronunciation)</p>
      </div>
      <div class="row item-v">
        <div class="col-6 col-md-4">
          <img src="image/dog.jpg" alt="Dog" onclick="playAudio('dog')">
          <p>Dog</p>
        </div>
        <div class="col-6 col-md-4">
          <img src="image/cat.jpg" alt="Cat" onclick="playAudio('cat')">
          <p>Cat</p>
        </div>
        <div class="col-6 col-md-4">
          <img src="image/rabbit.jpg" alt="Rabbit" onclick="playAudio('rabbit')">
          <p>Rabbit</p>
        </div>
        <div class="col-6 col-md-4">
          <img src="image/cow.jpg" alt="Cow" onclick="playAudio('cow')">
          <p>Cow</p>
        </div>
        <div class="col-6 col-md-4">
          <img src="image/horse.jpg" alt="Horse" onclick="playAudio('horse')">
          <p>Horse</p>
        </div>
        <div class="col-6 col-md-4">
          <img src="image/pig.jpg" alt="Pig" onclick="playAudio('pig')">
          <p>Pig</p>
        </div>
      </div>
      <div class="intro">
        <p>2. Complete the sentence with the words from above</p>
      </div>
      <div class="row">
        <div class="col-12 col-md-8">
          <div class="mb-3">
            <label for="sentence1">1. The <select id="sentence1">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> barks loudly.</label>
          </div>
          <div class="mb-3">
            <label for="sentence2">2. The <select id="sentence2">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> rolls in the mud.</label>
          </div>
          <div class="mb-3">
            <label for="sentence3">3. The <select id="sentence3">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> likes to chase mice.</label>
          </div>
          <div class="mb-3">
            <label for="sentence4">4. The <select id="sentence4">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> runs fast in the field.</label>
          </div>
          <div class="mb-3">
            <label for="sentence5">5. The <select id="sentence5">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> hops around the garden.</label>
          </div>
          <div class="mb-3">
            <label for="sentence6">6. The <select id="sentence6">
              <option value="">Select</option>
              <option value="dog">dog</option>
              <option value="cat">cat</option>
              <option value="rabbit">rabbit</option>
              <option value="cow">cow</option>
              <option value="horse">horse</option>
              <option value="pig">pig</option>
            </select> gives us milk.</label>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div id="vocabAnswer" class="vocab-answer">
            <h6>Answer</h6>
            <p>1. The dog barks loudly.</p>
            <p>2. The pig rolls in the mud.</p>
            <p>3. The cat likes to chase mice.</p>
            <p>4. The horse runs fast in the field.</p>
            <p>5. The rabbit hops around the garden.</p>
            <p>6. The cow gives us milk.</p>
          </div>
        </div>  
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <button class="btn btn-success" onclick="checkVocabularyAnswers()">Check</button>
          <button class="btn btn-warning" onclick="resetInputs()">Reset</button>
        </div>
      </div>
    </div>
</div>
<div class="container grammar-section" id="grammarSection">
    <div class="section-lesson">
      <div class="type">
        <h2>Grammar</h2>
      </div>
      <div class="video">
        <h4>Present Simple (Verb to be)</h4>
        <iframe width="70%" height="350pz" src="https://www.youtube.com/embed/Rstjd4ipXvc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="row below-video">
        <div class="col-12 col-md-7 form-tb">
          <h4>Form</h4>
          <p><strong>Positive:</strong> Subject + am/is/are/ + Object</p>
          <p>Ex: I am a student.</p>
          <p><strong>Negative</strong>: Subject + am/is/are/ + not + Object</p>
          <p>Ex: He is not a student.</p>
          <p><strong>Question</strong>: Am/Is/Are + Subject + Object</p>
          <p>Ex: Are you a student.</p>
        </div>
        <div class="col-12 col-md-5 con-use">
          <div class="use-tb">
            <h4>Am/Is/Are</h4>
            <p>I <span>am</span></p>
            <p>He/she/it <span>is</span></p>
            <p>You/we/they <span>are</span></p>
          </div>
          <div class="usage">
            <p><strong>Usages:</strong> we use (verb to be) to describe identity, characteristics, conditions, time, location, and feeling.</p>
          </div>
        </div>
    </div>
    <h4>Fill in the blanks with the correct form of the verb "to be" (am, is, are).</h4>
    <div class="row">
        <div class="col-12 col-md-7 form-group">
          <label for="question1">1. I <input type="text" class="form-control" id="question1"> a teacher. (positive)</label>
          <label for="question2">2. She <input type="text" class="form-control" id="question2"> my sister. (negative)</label>
          <label for="question3">3. <input type="text" class="form-control" id="question3"> you my friend? (question)</label>
          <label for="question4">4. They <input type="text" class="form-control" id="question4"> at the park. (positive)</label>
          <label for="question5">5. We <input type="text" class="form-control" id="question5"> not ready. (negative)</label>
          <label for="question6">6. <input type="text" class="form-control" id="question6"> it raining outside? (question)</label>
          <label for="question7">7. He <input type="text" class="form-control" id="question7"> very tall. (positive)</label>
          <label for="question8">8. You <input type="text" class="form-control" id="question8"> not late. (negative)</label>
          <label for="question9">9. <input type="text" class="form-control" id="question9"> I correct? (question)</label>
          <label for="question10">10. It <input type="text" class="form-control" id="question10"> a sunny day. (positive)</label>
        </div>
        <div class="col-12 col-md-5 grammar-answer mt-3" id="grammarAnswer">
          <div class="box-key">
            <h6>Answer Key:</h6>
            <p>1. am &nbsp;&nbsp;&nbsp;&nbsp; 2. is</p>
            <p>3. Are &nbsp;&nbsp;&nbsp;&nbsp; 4. are</p>
            <p>5. are &nbsp;&nbsp;&nbsp;&nbsp; 6. Is</p>
            <p>7. is &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8. are</p>
            <p>9. Am &nbsp;&nbsp;&nbsp;&nbsp; 10. is</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <button class="btn btn-success" onclick="checkGrammarAnswers()">Check</button>
          <button class="btn btn-warning" onclick="resetInputs()">Reset</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container reading-section" id="readingSection"> <!--reading section-->
    <div class="section-lesson">
      <div class="type">
        <h2>Reading</h2>
      </div>
      <div class="intro">
        <p>Read the paragraph below</p>
      </div>
      <div class="row reading-paragraph">
        <div class="col-12 col-md-6 paragraph">
          <h5>A Day at the Zoo</h5>
          <p>Today, I am at the zoo. It is a sunny day. The animals are very interesting. First, I see the lions. They are big and strong. The lions are in their cage. The lion cubs are playing. They are cute. Next, I visit the monkeys. The monkeys are funny. They are jumping and swinging on the trees. One monkey is eating a banana. It is happy. Then, I go to see the elephants. The elephants are very large. They are walking slowly. One elephant is drinking water. The baby elephant is with its mother. They are together. I also see the birds. The birds are colorful. They are flying in the sky. One bird is singing. It is a beautiful song. At the end of the day, I am tired but happy. The zoo is a fun place. I am glad I came.</p>
        </div>
        <div class="col-12 col-md-6 image-reading">
          <img src="image/reading1.jpg" alt="">
        </div>
      </div>
      <div class="intro">
        <p>2. Listen and repeat
          <img src="image/download.png" alt="Play Audio" width="30px" height="30px" onclick="playAudio('audioClip')" style="cursor:pointer;">
          <audio id="audioClip" src="reading.mp3"></audio>
        </p>
      </div>
      <div class="intro">
        <p>3. Choose the correct answer in the paragraph above.</p>
      </div>
      <div class="row reading-test">
        <div class="col-12 col-md-9">
          <label>1. What is the weather like today?</label>
          <div class="radio" id="question1">
            <label><input type="radio" name="question1" value="a">a. Rainy</label>
            <label><input type="radio" name="question1" value="b">b. Sunny</label>
            <label><input type="radio" name="question1" value="c">c. Cloudy</label>
          </div>
          <label>2. Where are the lions?</label>
          <div class="radio" id="question2">
            <label><input type="radio" name="question2" value="a">a. In the jungle</label>
            <label><input type="radio" name="question2" value="b">b. In their cage</label>
            <label><input type="radio" name="question2" value="c">c. In the water</label>
          </div>
          <label>3. What are the monkeys doing?</label>
          <div class="radio" id="question3">
            <label><input type="radio" name="question3" value="a">a. Sleeping</label>
            <label><input type="radio" name="question3" value="b">b. Running on the ground</label>
            <label><input type="radio" name="question3" value="c">c. Jumping and swinging on the trees</label>
          </div>
          <label>4. How do the elephants walk?</label>
          <div class="radio" id="question4">
            <label><input type="radio" name="question4" value="a">a. Quickly</label>
            <label><input type="radio" name="question4" value="b">b. Slowly</label>
            <label><input type="radio" name="question4" value="c">c. Backwards</label>
          </div>
          <label>5. What is one monkey eating?</label>
          <div class="radio" id="question5">
            <label><input type="radio" name="question5" value="a">a. An apple</label>
            <label><input type="radio" name="question5" value="b">b. A banana</label>
            <label><input type="radio" name="question5" value="c">c. A carrot</label>
          </div>
          <label>6. What is the bird doing?</label>
          <div class="radio" id="question6">
            <label><input type="radio" name="question6" value="a">a. Singing</label>
            <label><input type="radio" name="question6" value="b">b. Eating</label>
            <label><input type="radio" name="question6" value="c">c. Sleeping</label>
          </div>
          <label>7. How does the writer feel at the end of the day?</label>
          <div class="radio" id="question7">
            <label><input type="radio" name="question7" value="a">a. Sad and tired</label>
            <label><input type="radio" name="question7" value="b">b. Happy and energetic</label>
            <label><input type="radio" name="question7" value="c">c. Tired but happy</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <button class="btn btn-success" onclick="checkReadingAnswers()">Check</button>
          <button class="btn btn-warning" onclick="resetInputs()">Reset</button>
        </div>
      </div>
      <div id="result"></div>
    </div>
  </div>
  <div class="unit" id="unit2Link">
    <h1>Unit 2 School Day</h1>
  </div>
  <div class="unit" id="unit3Link">
    <h1>Unit 3 Home Time</h1>
  </div>
  <div class="unit" id="unit4Link">
    <h1>Unit 4 Connected</h1>
  </div>
  <div class="unit" id="unit5Link">
    <h1>Unit 5 Good Buys</h1>
  </div>
  <div class="unit" id="unit6Link">
    <h1>Unit 6 Holiday</h1>
  </div>
  <div class="unit" id="unit7Link">
    <h1>Unit 7 School Day</h1>
  </div>
  <div class="unit" id="unit8Link">
    <h1>Unit 8 Home Time</h1>
  </div>
  <div class="unit" id="unit9Link">
    <h1>Unit 9 Connected</h1>
  </div>
  <div class="unit" id="unit10Link">
    <h1>Unit 10 Good Buys</h1>
  </div>
  <div class="unit" id="unit11Link">
    <h1>Unit 11 Holiday</h1>
  </div>
  <div class="unit" id="unit12Link">
    <h1>Unit 12 Holiday</h1>
  </div>

<?php include 'bfooter.php'; ?>