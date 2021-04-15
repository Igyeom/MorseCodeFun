var context = new AudioContext();
var o = context.createOscillator();

var frequency = 1000.0;
o.frequency.value = frequency;
var counter = 0;
var interval = 0;
var message = "";

var MORSE_CODE = {".-": "a", "-...":"b", "-.-.": "c", "-..": "d", ".":"e", "..-.":"f", "--.":"g", "....":"h", "..":"i", ".---":"j", "-.-":"k", ".-..":"l", "--":"m", "-.":"n", "---":"o", ".--.":"p", "--.-":"q", ".-.":"r", "...":"s", "-":"t", "..-":"u", "...-":"v", ".--":"w", "-..-":"x", "-.--":"y", "--..":"z", ".----":"1", "..---":"2", "...--":"3", "....-":"4", ".....":"5", "-....":"6", "--...":"7", "---..":"8", "----.":"9", "-----":"0", "|":" ", "..--":"\n"};

var decodeMorse = function(morseCode){
  var words = (morseCode).split('  ');
  var letters = words.map((w) => w.split(' '));
  var decoded = [];

  for(var i = 0; i < letters.length; i++){
    decoded[i] = [];
    for(var x = 0; x < letters[i].length; x++){
        if(MORSE_CODE[letters[i][x]]){
            decoded[i].push( MORSE_CODE[letters[i][x]] );
        }
    }
  }

  return decoded.map(arr => arr.join('')).join(' ');
}

function red() {
  if (counter > 70) {
    message += "   ";
    document.getElementById('result').value += decodeMorse(message);
    message = "";
  } else if (counter > 30) {
    document.getElementById('result').value += decodeMorse(message);
    message = "";
  }
  var key = document.getElementById('key');
  key.style.backgroundColor = "red";
  clearInterval(interval);
  o.type = "sine";
  o.connect(context.destination);
  o.start();
  counter = 0;
  interval = setInterval(count, 10);
}

function lime() {
  var key = document.getElementById('key');
  key.style.backgroundColor = "lime";
  o.disconnect(context.destination);
  o.stop();
  o = context.createOscillator();
  o.frequency.value = frequency;
  clearInterval(interval);
  dit_or_dah();
  counter = 0;
  interval = setInterval(count, 10);
}

function setfreq() {
  var freq = document.getElementById('freq').value;
  var submit = document.getElementById('submit');
  submit.style.backgroundColor = "red";
  frequency = freq;
  o.frequency.value = frequency;
}

function black() {
  var submit = document.getElementById('submit');
  submit.style.backgroundColor = "black";
}

function count() {
  counter++;
}

function dit_or_dah() {
  if (counter < 25) {
    message = message + ".";
  } else {
    message = message + "-";
  }
}

function changePassword() {

}
