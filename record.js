var SpeechRecognition = window.webkitSpeechRecognition; //creating an instance
var rec = new SpeechRecognition(); //creating an object to access the function
rec.continuous = true; //To hear continuously
var Textbox = $("#textbox"); //To display the text
var Instructions = $("#instructions");//to display ongoing process
var Confidence=$('#confidence')
var Confi=$('#confi');
var con="Confidence";

var Content = ''; //to concatenate the text
$('#end').prop('disabled', true);
$('#sub').prop('disabled', true);

rec.onresult = function(event)
{
  Instructions.text("Recogination started, press the stop button to stop the recognition");
  /*This function runs when the user starts to speak*/
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript; //to get the text from the object
  Content += transcript; //concatenate the text with the previous content
  Textbox.text(Content); //Displaying the result
  con=event.results[0][0].confidence;
};

/*to start the conversion*/
$('#start').on('click', function(e)
{
  $('#start').prop('disabled', true);
  Instructions.text("Speak Out");
  $('#end').prop('disabled', false);
  $('#sub').prop('disabled', true);
  if (Content.length)
  {
    Content += ' ';
  }
  rec.start(); //Start of speech to text
}
);

/*to stop the conversion*/
$('#end').on('click',function(e)
{
  Instructions.text("Press the start button to start the recognition agaain or press upload button to upload");
  $('#start').prop('disabled', false);
  $('#end').prop('disabled', true);
  $('#sub').prop('disabled',false);
  rec.stop(); //Stops the recording
  con.toString();
  Confidence.text(con);
  Confi.text(con);
});

Textbox.on('input', function()
{
  Content = $(this).val();
})

var mic;
function setup()
{
  createCanvas(200,200);
  mic= new p5.AudioIn();
  mic.start();
}
function draw()
{
  background(0);
  var vol= mic.getLevel();
  ellipse(100,100,200,vol*200);
}
