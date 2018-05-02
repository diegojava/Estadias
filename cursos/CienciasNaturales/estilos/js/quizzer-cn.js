
// 1
var questions = [
	[
		"Está formado por el sistema óseo, articulaciones y el sistema muscular (músculos y tendones).",
		"Huesos",
		"Ligamentos",
		"Cuerpo humano",
		"Aparato Locomotor",
		3
	],
	[
		"forma parte del cuerpo de los humanos, está formado por huesos, y son las estructuras más duras de nuestro cuerpo.",
		"Aparato óseo",
		"Articulaciones",
	    "Músculos",
		"Aparato locomotor",
		0
	],
	[
		"Así se le llaman a los puntos que unen los huesos",
		"Aparato óseo",
		"Aparato locomotor",
		"Articulaciones",
		"Músculos",
		2
	],
	[
	      
		"Los huesos, articulaciones, cartílagos y ligamentos forman lo que conocemos como...",
		"Aparato locomotor",
		"Músculos",
		"Aparato óseo",
		"Ninguno de los anteriores",
		2
	],
	[
		"Cuando se rompe un hueso, se dice que es...",
		"Una fractura",
		"Un esguince",
		"Calentamiento",
		"Movimiento del cuerpo",
		0
	],
	[
		"Los esguinces son comunes en las articulaciones como...",
		"Huesos",
		"Aparato locomotor",
		"Músculos",
		"Tobillo y codo",
		3
	],
	[
		"Es cuando le hacemos algo a nuestro cuerpo cuando no está preparado...",
		"Lesiones",
		"Movimiento del cuerpo",
		"Calentamiento",
		"Ninguna de las anteriores",
		0
	],
	[
		"Son las lesiones más comunes en las personas",
		"Esguince",
		"Fracturas",
		"Dislocacion",
		"Todas las anteriores",
		3
	],
];

// 2
var questionTemplate = _.template(" \
	<div class='card question'><span class='question'><%= question %></span> \
      <ul class='options'> \
        <li> \
          <input type='radio' name='question[<%= index %>]' value='0' id='q<%= index %>o1'> \
          <label for='q<%= index %>o1'><%= a %></label> \
        </li> \
        <li> \
          <input type='radio' name='question[<%= index %>]' value='1' id='q<%= index %>o2'> \
          <label for='q<%= index %>o2'><%= b %></label> \
        </li> \
        <li> \
          <input type='radio' name='question[<%= index %>]' value='2' id='q<%= index %>o3'> \
          <label for='q<%= index %>o3'><%= c %></label> \
        </li> \
        <li> \
          <input type='radio' name='question[<%= index %>]' value='3' id='q<%= index %>o4'> \
          <label for='q<%= index %>o4'><%= d %></label> \
        </li> \
      </ul> \
    </div> \
    ");


// 3
var points,
	pointsPerQuestion,
	currentQuestion,
	questionTimer,
	timeForQuestion = 100, // seconds
	timeLeftForQuestion; 

// 4
$(function() {

	// 
	$('button.start').click(start);
	$('.play_again button').click(restart);


	function restart() {
		points = 0;
		pointsPerQuestion = 10;
		currentQuestion = 0;
		timeLeftForQuestion = timeForQuestion;

		$('.finish.card').hide();
		$('div.start').show();
		$('.times_up').hide();

		generateCards();
		updateTime();
		updatePoints();
	}

	// 
	function start() {
		$('div.start').fadeOut(200, function() {
			moveToNextQuestion();
		});
	}

	// 
	function generateCards() {
		$('.questions').html('');
		for (var i = 0; i < questions.length; i++) {
			var q = questions[i];
			var html = questionTemplate({
				question: q[0],
				index: i,
				a: q[1],
				b: q[2],
				c: q[3],
				d: q[4]
			});
			$('.questions').append(html);
		};
		$('.question.card input').change(optionSelected);
	}

	// 
	function moveToNextQuestion() {
		currentQuestion += 1;
		if (currentQuestion > 1) {
			$('.question.card:nth-child(' + (currentQuestion-1) + ')').hide();
		}
		showQuestionCardAtIndex(currentQuestion);
		setupQuestionTimer();
	}

	// 
	function setupQuestionTimer() {
		if (currentQuestion > 1) {
			clearTimeout(questionTimer);
		}
		timeLeftForQuestion = timeForQuestion;
		questionTimer = setTimeout(countdownTick, 1000);
	}

	// 
	function showQuestionCardAtIndex(index) { // staring at 1
		var $card = $('.question.card:nth-child(' + index + ')').show();
	}

	// 
	function countdownTick() {
		timeLeftForQuestion -= 1;
		updateTime();
		if (timeLeftForQuestion == 0) { 
			return finish();
		}
		questionTimer = setTimeout(countdownTick, 1000);
	}

	// 
	function updateTime() {
		$('.countdown .time_left').html(timeLeftForQuestion + 's');
	}

	// 
	function updatePoints() {
		$('.points span.points').html(points + ' puntos');
	}

	// 
	function optionSelected() {
		var selected = parseInt(this.value);
		var correct = questions[currentQuestion-1][5];

		if (selected == correct) {
			points += pointsPerQuestion;
			updatePoints();
			correctAnimation();
		} else {
			wrongAnimation();
		}

		if (currentQuestion == questions.length) {
			clearTimeout(questionTimer);
			return finish();
		}
		moveToNextQuestion();
	}

	
	function correctAnimation() {
		animatePoints('right');
	}

	// 
	function wrongAnimation() {
		animatePoints('wrong');
	}

	// 
	function animatePoints(cls) {
		$('header .points').addClass('animate ' + cls);
		setTimeout(function() {
			$('header .points').removeClass('animate ' + cls);
		}, 500);
	}

	// 
	function finish() {
		if (timeLeftForQuestion == 0) {
			$('.times_up').show();
		}
		



		//$('p.final_points').html(points + ' puntos');
		if(points <= 30){
		$('p.final_points').html('Sigue practicando');
		}
		if(points > 31){
		$('p.final_points').html('Eres normal');
		}
		if(points >= 60){
		$('p.final_points').html('Eres un crack');
		}


		$('.question.card:visible').hide();
		if($('.finish.card').show())

		var puntuacion = points;
		//$.post('examen-1.php', {puntuaciontotal: puntuacion});
  		//setTimeout(window.location.href = "examen-1.php?puntuacion=" + puntuacion,2000);
  		setTimeout(function() {
  		window.location.href = "examen.php?puntuacion="+puntuacion;
		}, 5000);

		$('.terminar').show();
  		
	}


	// 
	restart();

});