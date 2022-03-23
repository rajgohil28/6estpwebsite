/* <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.23.0/axios.min.js" integrity="sha512-Idr7xVNnMWCsgBQscTSCivBNWWH30oo/tzYORviOCrLKmBaRxRflm2miNhTFJNVmXvCtzgms5nlJF4az2hiGnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> */
//<script src="http://brainshop.ai/api/aco.js?bid=160409&key=JPZqUwhi78JtmiaT"></script>

const voice = document.querySelector(".voice");
const voice2text = document.querySelector(".voice2text");

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recorder = new SpeechRecognition();

function addHumanText(text) {
    const chatContainer = document.createElement("div");
    chatContainer.classList.add("chat-container");
    const chatBox = document.createElement("p");
    chatBox.classList.add("voice2text");
    const chatText = document.createTextNode(text);
    chatBox.appendChild(chatText);
    chatContainer.appendChild(chatBox);
    return chatContainer;
};

function addBotText(text) {
    const chatContainer1 = document.createElement("div");
    chatContainer1.classList.add("chat-container");
    chatContainer1.classList.add("darker");
    const chatBox1 = document.createElement("p");
    chatBox1.classList.add("voice2text");
    const chatText1 = document.createTextNode(text);
    chatBox1.appendChild(chatText1);
    chatContainer1.appendChild(chatBox1);
    return chatContainer1;
};

// function botVoice(message) {
//     const speech = new SpeechSynthesisUtterance();
//     speech.text = message;

//     // if (message.includes('how are you')) {
//     //   speech.text = "I am fine, thanks. How are you?";
//     // }

//     // if (message.includes('fine')) {
//     //   speech.text = "Nice to hear that. How can I assist you today?";
//     // }

//     // if (message.includes('weather')) {
//     //   speech.text = "Of course. Where are you currently?";
//     // }

//     // if (message.includes('London')) {
//     //   speech.text = "It is 18 degrees and sunny.";
//     // }

//     speech.volume = 1;
//     speech.rate = 1;
//     speech.pitch = 1;
//     window.speechSynthesis.speak(speech);
//     var element = document.getElementById("container");
//     element.appendChild(addBotText(speech.text));
// };

recorder.onstart = () => {
    console.log('Voice activated');
};

recorder.onresult = (event) => {
    
    const resultIndex = event.resultIndex;
    const transcript = event.results[resultIndex][0].transcript;
    // console.log(event);
    var element = document.getElementById("container");
    element.appendChild(addHumanText(transcript));
  //  if (transcript == undefined || transcript == "") {
        
 //   }
  //  else {
  //      let res = "";
      //  await axios.get('http://api.brainshop.ai/get?bid=160409&key=JPZqUwhi78JtmiaT&uid=[160409]&msg=[transcript]').then(data => {
     //       res = JSON.stringify(data.data.response);
    //    })
//    }

    const speech = new SpeechSynthesisUtterance();
    speech.text = "message";
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    window.speechSynthesis.speak(speech);
    var element = document.getElementById("container");
    element.appendChild(addBotText(speech.text));
};

voice.addEventListener('click', () => {
    recorder.start();
});