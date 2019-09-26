<template></template>
<script>
const pressed = [];
const secret = "mole-game";

window.addEventListener("keyup",(e) => {
	pressed.push(e.key);
	pressed.splice(-secret.length - 1, pressed.length - secret.length);

	if(pressed.join('').includes(secret)){
		window.location.replace('http://localhost:8000/mole');
	}
});
</script>