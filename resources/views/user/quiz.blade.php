<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ISPORT - Coaches</title>
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" href="{{URL::asset('images/icon.png')}}" type="image/png">
</head>

<body style="background-color: #efefef;">

  {{--
@include('comp.userNav')
@include('comp.sidbar') --}}

  <div id="page-content-wrapper">
    <div class="container mt-5  ">
      <div class="row">
        {{-- <div class="col-lg-12">
                <a href="#menu-toggle" class=" text-success " id="menu-toggle"><svg class="mt-2 mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-toggles" viewBox="0 0 16 16">
                    <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7h-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm2.45 0A3.49 3.49 0 0 1 8 3.5 3.49 3.49 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5H6.95zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7z"/>
                  </svg></i></a> --}}

        {{-- <h1>Welcome to Your Coaching Dashboard</h1>
                
                <p>From here, you can manage your coaching schedule, review your progress, and book new coaching sessions or online courses. Use the menu on the left to access different parts of your dashboard, or click on the quick links to jump to specific actions. We hope you find our platform helpful in achieving your sports goals, and we look forward to seeing your progress!</p> --}}
      </div>

    </div>
    <style>
      body {
        background-color: #000000;
        padding: 0px;
        margin: 0px;
      }

      #gradient {
        width: 100%;
        height: 800px;
        padding: 0px;
        margin: 0px;
      }

      #quiz {
        margin: 0 auto;
        width: 73%;
        padding: 20px;
        border: 1px solid #ccc;
      }

      h2 {
        text-align: center;
      }



      .form-group {
        margin-bottom: 20px;
      }

      label {
        font-weight: bold;
        margin-bottom: 5px;
      }

      input[type="number"],
      select {
        padding: 10px;
        font-size: 16px;
      }

      button {
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      button:hover {
        background-color: #3e8e41;
      }
    </style>
    <!-- /#page-content-wrapper -->
    <div class="row mb-4">

      <div class="mt-2">
        <div id="quiz" class="w-50" style="background-color: #243441; border:none;">
          <h2 class="text-success">Assessment Quiz</h2>
          <form id="quiz-form">
            <div class="form-group">
              <label class="text-white" for="height">What is your height? (in cm)</label>
              <input type="number" id="height" name="height" class="w-100" required>
            </div>
            <div class="form-group">
              <label class="text-white" for="weight">What is your weight? (in kg)</label>
              <div>
                <input type="number" id="weight" name="weight" class="w-100" required>
              </div>
            </div>
            <div class="form-group ">
              <label class="text-white" for="activity-level">What is your activity level?</label>
              <select class="w-100" id="activity-level" name="activity-level" required>
                <option value="">Select an option</option>
                <option value="sedentary">Sedentary (little or no exercise)</option>
                <option value="lightly-active">Lightly active (light exercise or sports 1-3 days a week)</option>
                <option value="moderately-active">Moderately active (moderate exercise or sports 3-5 days a week)
                </option>
                <option value="very-active">Very active (hard exercise or sports 6-7 days a week)</option>
                <option value="extra-active">Extra active (very hard exercise or sports, physical job or training twice
                  a day)</option>
              </select>
            </div>
            <button class="w-100" type="submit" id="submit-quiz">Calculate</button>

          </form>
          <div>

          </div>
          <div id="result-container" class=" text-white">

          </div>
          <div class="text-center w-100" id="savebtn" style="display: none">
            <form action="{{route('quizzdone')}}" method="post">
              @csrf
              <input type="hidden" name="bmi" id="bmi">
              <button class="btn btn-success mt-3 w-100">SAVE</button>
            </form>
          </div>
          {{-- a center button shows after end the quiz for saving details --}}

        </div>
      </div>
      {{-- h1 in green top coaches --}}
      {{-- --}}

    </div>
  </div>

  </div>
  {{-- top top courses --}}

  <!-- /#wrapper -->
  <script>
    const quizForm = document.getElementById('quiz-form');
    const submitButton = document.getElementById('submit-quiz');
    const resultContainer = document.getElementById('result-container');
    let savebtn = document.getElementById('savebtn')
    let bmisc = document.getElementById('bmi')
    submitButton.addEventListener('click', function(e) {
      quizForm.style.display = 'none';
      savebtn.style.display = 'block';
      e.preventDefault();
      const height = document.getElementById('height').value;
      const weight = document.getElementById('weight').value;
      const activityLevel = document.getElementById('activity-level').value;
      // Perform calculations and determine training plan based on user inputs
      const bmi = weight / Math.pow(height / 100, 2);
      let trainingPlan = '';
      if (bmi < 18.5) {
        trainingPlan =
          'You should focus on building muscle mass and gaining weight through strength training and a high-protein diet.';
      } else if (bmi < 25) {
        trainingPlan =
          'You should focus on maintaining your current weight and building overall fitness through a combination of cardio and strength training.';
      } else if (bmi < 30) {
        trainingPlan =
          'You should focus on losing body fat through a combination of cardio and strength training, and following a balanced, low-calorie diet.';
      } else {
        trainingPlan =
          'You should focus on losing weight and reducing body fat through a combination of cardio and strength training, and following a balanced, low-calorie diet.';
      }
      // Display the recommended training plan to the user
      const resultText = `Based on your inputs, your BMI is ${bmi.toFixed(1)}, which means: ${trainingPlan}`;
      resultContainer.innerText = resultText;
      bmisc.value = bmi.toFixed(1);
      resultContainer.classList.add('active');
      //   hide the quiz form
    });
  </script>
  @include('comp.jq')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>