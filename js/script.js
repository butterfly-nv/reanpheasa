document.getElementById('unit1Link').addEventListener('click', function() {
  var vocabularySection = document.getElementById('vocabularySection');
  var grammarSection = document.getElementById('grammarSection');
  var readingSection = document.getElementById('readingSection');
  
  // Toggle vocabulary section
  vocabularySection.style.display = (vocabularySection.style.display === 'none' || vocabularySection.style.display === '') ? 'block' : 'none';
  
  // Toggle grammar section
  grammarSection.style.display = (grammarSection.style.display === 'none' || grammarSection.style.display === '') ? 'block' : 'none';
  
  // Toggle reading section
  readingSection.style.display = (readingSection.style.display === 'none' || readingSection.style.display === '') ? 'block' : 'none';
});

let currentAudio = null; // Variable to track the currently playing audio

function playAudio(audioId) {
  const audioElement = document.getElementById(audioId);
  
  if (audioElement) {
    // Pause previously playing audio if it's different
    if (currentAudio && currentAudio !== audioElement) {
      currentAudio.pause();
      currentAudio.currentTime = 0; // Optionally reset the audio
    }

    // Check if the clicked audio is already playing
    if (audioElement.paused) {
      currentAudio = audioElement; // Set the current audio to the one being played
      audioElement.currentTime = 0; // Rewind to the start before playing
      audioElement.play();
    } else {
      // Pause if the same audio is clicked again
      audioElement.pause();
      currentAudio = null; // Reset current audio
    }
  } else {
    // If the audio element doesn't exist, create a new Audio instance
    const audio = new Audio('audio/' + audioId + '.mp3');
    audio.play();
  }
}

function checkVocabularyAnswers() {
  const answers = {
    sentence1: 'dog',
    sentence2: 'pig',
    sentence3: 'cat',
    sentence4: 'horse',
    sentence5: 'rabbit',
    sentence6: 'cow'
  };

  let correct = true;

  for (let key in answers) {
    const selectElement = document.getElementById(key);
    if (selectElement.value === answers[key]) {
      selectElement.parentElement.classList.remove('red');
      selectElement.parentElement.classList.add('green');
    } else {
      selectElement.parentElement.classList.remove('green');
      selectElement.parentElement.classList.add('red');
      correct = false;
    }
  }

  document.getElementById('vocabAnswer').style.display = 'block';
}

function checkGrammarAnswers() {
  const answers = ["am", "is", "Are", "are", "are", "Is", "is", "are", "Am", "is"];
  for (let i = 1; i <= 10; i++) {
    const userAnswer = document.getElementById('question' + i).value.trim();
    const questionElement = document.getElementById('question' + i);
    if (userAnswer === answers[i - 1]) {
      questionElement.classList.add('green');
      questionElement.classList.remove('red');
    } else {
      questionElement.classList.add('red');
      questionElement.classList.remove('green');
    }
  }
  document.getElementById('grammarAnswer').style.display = 'block';
}

function resetInputs() {
  // Reset text inputs for grammar section
  for (let i = 1; i <= 10; i++) {
    const questionInput = document.getElementById(`question${i}`);
    questionInput.value = ''; // Clear the input
    questionInput.classList.remove('green', 'red'); // Remove styles
  }
  
  // Reset dropdown selections for vocabulary section
  const selectElementsVocabulary = document.querySelectorAll('#vocabularySection select');
  selectElementsVocabulary.forEach(select => {
    select.selectedIndex = 0; // Reset to default
    select.parentElement.classList.remove('green', 'red'); // Remove styles
  });

  // Reset dropdown selections for grammar section
  const selectElementsGrammar = document.querySelectorAll('#grammarSection select');
  selectElementsGrammar.forEach(select => {
    select.selectedIndex = 0; // Reset to default
    select.parentElement.classList.remove('green', 'red'); // Remove styles
  });

  // Hide answer sections
  document.getElementById('vocabAnswer').style.display = 'none'; // Hide vocabulary answer section
  document.getElementById('grammarAnswer').style.display = 'none'; // Hide grammar answer section
  
  // Stop any currently playing audio
  if (currentAudio) {
    currentAudio.pause();
    currentAudio.currentTime = 0; // Reset current audio
    currentAudio = null; // Clear current audio reference
  }

  // Reset radio buttons for reading section
  document.querySelectorAll('input[type="radio"]').forEach(input => {
    input.checked = false;
  });
  
  // Reset the result text for reading answers
  document.getElementById('result').innerText = '';
  
  const readingQuestions = document.querySelectorAll('#readingSection .reading-question');
  readingQuestions.forEach(div => {
    div.classList.remove('green', 'red'); // Remove styles for all reading questions
  });

}

function checkReadingAnswers() {
  const answers = {
    question1: 'b', 
    question2: 'b', 
    question3: 'c', 
    question4: 'b', 
    question5: 'b',
    question6: 'a',
    question7: 'c',
  };
  
  let score = 0;
  let totalQuestions = Object.keys(answers).length;

  for (let i = 1; i <= totalQuestions; i++) {
    let question = 'question' + i;
    let selected = document.querySelector(`input[name="${question}"]:checked`);
    const userAnswer = selected ? selected.value : null;
    
    // Reset styles for the current question
    const questionDiv = document.getElementById(question);
    questionDiv.classList.remove('green', 'red');

    // Check if the user's answer is correct
    if (userAnswer === answers[question]) {
      score++;
      // Add green class to indicate correct answer
      questionDiv.classList.add('green');
    } else {
      // Add red class to indicate incorrect answer
      if (selected) {
        selected.parentElement.classList.add('red'); // Highlight the selected answer in red
      }
      // Highlight the correct answer in green
      const correctInput = document.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
      if (correctInput) {
        correctInput.parentElement.classList.add('green'); // Highlight the correct answer in green
      }
    }
  }

  document.getElementById('result').innerText = `You got ${score} out of ${totalQuestions} correct.`;
}

