const toggle = document.getElementById('toggleSwitch');

toggle.addEventListener('change', function() {
  if (this.checked) {
    console.log("Switch is ON");
    // Run your code for ON state here
  } else {
    console.log("Switch is OFF");
    // Run your code for OFF state here
  }
});