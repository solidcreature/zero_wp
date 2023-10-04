//This snippet allows to have DIVs 100% screen height on mobile devices, use height: calc(100% * var(--vh)); in CSS

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener('resize', () => {
	vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vh', `${vh}px`);
});