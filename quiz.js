const questions = [
    {
        question: "¿Qué es la contaminación del aire?",
        choices: ["Exceso de ruido en las ciudades", "Presencia de sustancias nocivas en la atmósfera", "Desperdicio de alimentos"],
        correctAnswer: 1
    },
    {
        question: "¿Cuál de estos es un contaminante del agua?",
        choices: ["Oxígeno", "Petróleo", "Arena"],
        correctAnswer: 1
    },
    {
        question: "¿Cómo se llama la capa que nos protege de los rayos UV del sol?",
        choices: ["Capa de ozono", "Capa de agua", "Capa de aire"],
        correctAnswer: 0
    },
    {
        question: "¿Cuál de los siguientes gases es un contamiante atmosférico importante?",
        choices: ["Oxígeno", "Nitrógeno", "Dióxido de Carbono"],
        correctAnswer: 2
    },
    {
        question: "¿Qué tipo de contaminación es causada principalmente por la quema de combustibles fósiles?",
        choices: ["Contaminación acústica", "Contaminación lumínica", "Contaminación del aire"],
        correctAnswer: 2
    },
    {
        question: "¿Cuál de las siguientes prácticas contribuye a la reducción de la contaminación del agua?",
        choices: ["Usar más pesticídas en la agricultura", "Descartar productos quimicos en el drenaje", "Implementar sistemas de tratamiento de aguas residuales"],
        correctAnswer: 2
    },
    {
        question: "¿Qué tipo de contaminación se refiere a la acumulación de desechos en los vertederos de basura?",
        choices: ["Contaminación acústica", "Contaminación del suelo", "Contaminación del aire"],
        correctAnswer: 1
    }
];

let currentQuestionIndex = 0;

function showQuestion() {
    const questionElement = document.getElementById('question');
    const choicesElement = document.getElementById('choices');
    questionElement.innerText = questions[currentQuestionIndex].question;
    choicesElement.innerHTML = '';
    questions[currentQuestionIndex].choices.forEach((choice, index) => {
        const button = document.createElement('button');
        button.innerText = choice;
        button.onclick = () => checkAnswer(index);
        choicesElement.appendChild(button);
    });
}

function checkAnswer(index) {
    if (index === questions[currentQuestionIndex].correctAnswer) {
        alert('¡Correcto!');
    } else {
        alert('Incorrecto. La respuesta correcta es: ' + questions[currentQuestionIndex].choices[questions[currentQuestionIndex].correctAnswer]);
    }
}

function nextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        alert('¡Has terminado el cuestionario!');
        currentQuestionIndex = 0;
        showQuestion();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    showQuestion();
});