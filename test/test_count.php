<script>
window.addEventListener('load', function() {
    const synth = window.speechSynthesis;
    let speech = new SpeechSynthesisUtterance();

    synth.onvoiceschanged = function() {
        const voices = synth.getVoices();
        // Perform actions when voices are loaded
        console.log("Voices loaded:", voices);
        // You can configure speech synthesis properties here, such as setting the voice
        // speech.voice = voices[0]; // Example: Set the first voice in the list
    };
    speech.text="UKINAM!";
    synth.speak(speech);
});
</script>
