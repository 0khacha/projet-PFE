let currentQuestionIndex = 0;

function showQuestion(index) {
    const questions = document.getElementsByClassName('question');
    for (let i = 0; i < questions.length; i++) {
        questions[i].style.display = i === index ? 'block' : 'none';
    }
}

function nextQuestion() {
    currentQuestionIndex++;
    showQuestion(currentQuestionIndex);
}

function checkEligibility() {
    const questions = document.getElementsByClassName('question');
    let eligibility = true;

    for (let i = 0; i < questions.length; i++) {
        const answer = document.querySelector(`input[name="question${i + 1}"]:checked`);

        if (!answer) {
            eligibility = false;
            break;
        }

        const isYes = answer.value === 'yes';

        // Check eligibility based on answers
        switch (i) {
            case 0:
                // Age eligibility
                if (!isYes) eligibility = false;
                break;
            case 1:
                // Health eligibility
                if (isYes) eligibility = false;
                break;
            case 2:
                // Weight eligibility
                if (!isYes) eligibility = false;
                break;
            case 3:
                // Medication eligibility
                if (isYes) eligibility = false;
                break;
            default:
                break;
        }
    }

    if (eligibility) {
        // Eligible, show the appointment form
        document.getElementById('eligibilityCheck').style.display = 'none';
        document.getElementById('appointmentForm').style.display = 'block';
    } else {
        // Not eligible, display a message or take appropriate action
        alert('Sorry, you need to answer all questions with "Yes" or "No" to proceed.');
    }
}

// Show the first question initially
showQuestion(currentQuestionIndex);
